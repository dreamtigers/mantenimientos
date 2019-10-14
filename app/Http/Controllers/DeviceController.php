<?php

namespace App\Http\Controllers;

use App\Models\Traccar\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $devices = Device::all();
        } else {
            $devices = auth()->user()->devices;
        }

        return view('devices.index', ['devices' => $devices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /* public function create() */
    /* { */
    /*     // */
    /* } */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Traccar\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = auth()->user()->devices()->where('id', $id)->first();

        return view('devices.show', ['device' => $device]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Traccar\Device  $device
     * @return \Illuminate\Http\Response
     */
    /* public function edit(Device $device) */
    /* { */
    /*     // */
    /* } */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Traccar\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Device $device)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Traccar\Device  $device
     * @return \Illuminate\Http\Response
     */
    public function destroy(Device $device)
    {
        //
    }
}
