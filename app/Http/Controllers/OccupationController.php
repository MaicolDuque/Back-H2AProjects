<?php

namespace App\Http\Controllers;

use App\Occupation;
use Illuminate\Http\Request;

class OccupationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Occupation::all();
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $occupation = Occupation::create($request->all());

        return response()->json($occupation, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function show(Occupation $occupation)
    {
        return $occupation;
    }

    
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Occupation $occupation)
    {
        $occupation->update($request->all());

        return response()->json($occupation, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Occupation  $occupation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Occupation $occupation)
    {
        $group->delete();

        return response()->json(null, 204);
    }
}
