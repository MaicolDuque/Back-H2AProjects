<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Section::all();
    }

    


    /**
     * @param id es el del projecto de las secciones
     * @return \Illuminate\Http\Response
     */

     public function returnSectionsProject($id){
        $sections = Section::where('project_id', $id)->get();

        foreach ($sections as $section){
            $section->tasks;
            foreach ($section->tasks as $task) {
                $task->state;
            }
        }
        // return $sections;
        return response()->json($sections, 200);
     }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $section = Section::create($request->all());

        return response()->json($section, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        return $section;
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        $section->update($request->all());

        return response()->json($section, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->delete();
        return response()->json(null, 204);
    }
}
