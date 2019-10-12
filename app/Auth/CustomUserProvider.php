<?php

/*
 * Thanks to:
 * https://laracasts.com/discuss/channels/laravel/replacing-the-laravel-authentication-with-a-custom-authentication
 */

namespace App\Auth;

use DB;
use Str;
use App\Models\Traccar\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;

class CustomUserProvider implements UserProvider {

    protected $table = 'tc_users';

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param mixed $identifier
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        $user = DB::connection('traccar')->table($this->table)->find($identifier);

        return $this->getGenericUser($user);
    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string  $token
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {
        $user = $this->getGenericUser(
            DB::connection('traccar')->table($this->table)->find($identifier)
        );

        return $user && $user->getRememberToken() && hash_equals($user->getRememberToken(), $token)
                    ? $user : null;
    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  string  $token
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {
        DB::connection('traccar')->table($this->table)
                ->where($user->getAuthIdentifierName(), $user->getAuthIdentifier())
                ->update([$user->getRememberTokenName() => $token]);
    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
           (count($credentials) === 1 &&
            array_key_exists('password', $credentials))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // generic "user" object that will be utilized by the Guard instances.
        $query = DB::connection('traccar')->table($this->table);

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'password')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        // Now we are ready to execute the query to see if we have an user matching
        // the given credentials. If not, we will just return nulls and indicate
        // that there are no matching users for these given credential arrays.
        $user = $query->first();

        return $this->getGenericUser($user);
    }

    /**
     * Get the generic user.
     *
     * @param  mixed  $user
     * @return \Illuminate\Auth\GenericUser|null
     */
    protected function getGenericUser($user)
    {
        if (! is_null($user)) {
            return new User((array) $user);
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        $algo = 'sha1';
        $iterations = 1000;
        $length = 48;
        $salt = $this->hexToString($user->getAuthSalt());

        $hashedValue = hash_pbkdf2( $algo, $credentials['password'], $salt,
            $iterations, $length);

        if (strlen($hashedValue) === 0) {
            return false;
        }

        /* print '<pre>'; */
        /* print_r($user->getAuthIdentifier()); */
        /* print '</pre>'; */
        return hash_equals($user->getAuthPassword(), $hashedValue);
    }

    // Thanks to Ivalenzuela for these 2 functions
    // https://www.traccar.org/forums/topic/login-php-hash-and-salt/
    private function stringToHex($string)
    {
        $hex = '';

        for ($i=0; $i < strlen($string) -1; $i++) {
            $hex .= dechex(ord( $string[$i] )); // Magic
        }
        return strtoupper($hex);
    }

    private function hexToString($hex)
    {
        $string = '';

        for ($i=0; $i < strlen($hex) -1; $i += 2) {
            $string .= chr(hexdec( $hex[$i] . $hex[$i+1] )); // Sorcery
        }
        return $string;
    }
}

?>
