<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $state = State::all();

        return $state;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function show(State $State)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function edit(State $State)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $State)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $State
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $State)
    {
        //
    }
}
