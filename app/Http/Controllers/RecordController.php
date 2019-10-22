<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Models\Traccar\Maintenance;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class RecordController extends Controller
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
            $records = Record::all();
        } else {
            $records = auth()->user()->records();
        }

        return view('records.index', ['records' => $records]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $params = [
            "maintenances" => Maintenance::all(),
        ];

        return view('records.create')->with($params);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO Add validation

        $record = new Record;
        // TODO I should validate that the device_id belongs to a user's device
        $record->device_id = $request->device_id;
        $record->maintenance_id = $request->maintenance_id;
        // TODO Get position id from model
        $record->position_id = 1;
        // TODO Get hours and distance (if they exist) from position model
        $record->total_hours = 0;
        $record->total_distance = 0;
        $record->save();

        // Contains an array of comments, but we don't want every comment, we just want
        // those that were checkboxed.
        $observations = collect($request->observations);
        // If the observation is non-null, return it, otherwise, return an
        // empty string. This is because the db can only insert a non-null
        // value into the table.
        $observations->transform(function ($obs) { return ($obs ? $obs : ''); });
        // Transform the value of each obs into an array ['observation' => $observation].
        // This will come in handy when we attach the activities.
        $observations->transform(function ($obs) { return ['observation' => $obs]; });

        // Contains an array of key (activity id) and value ("on"), we'll use
        // this to filter the observations.
        $activities = collect($request->activities);
        // Replace the value "on" for the array ['observation' => $obs] from above.
        $activities->transform(function($item, $id) use ($observations) { return $observations[$id]; });

        $record->activities()->attach($activities);

        return view('records.show', ['record' => $record]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Record::find($id);

        return view('records.show', ['record' => $record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
