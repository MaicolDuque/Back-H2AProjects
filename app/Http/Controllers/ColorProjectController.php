<?php

namespace App\Http\Controllers;

use App\ColorProject;
use Illuminate\Http\Request;

class ColorProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ColorProject::all();
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
     * @param  \App\ColorProject  $colorProject
     * @return \Illuminate\Http\Response
     */
    public function show(ColorProject $colorProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ColorProject  $colorProject
     * @return \Illuminate\Http\Response
     */
    public function edit(ColorProject $colorProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ColorProject  $colorProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ColorProject $colorProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ColorProject  $colorProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(ColorProject $colorProject)
    {
        //
    }
}
