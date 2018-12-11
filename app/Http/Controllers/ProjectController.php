<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        // $projects->color;
         //Retornar todos el grupo del susuario
        foreach ($projects as $project){
            $project->color;
            $project->groups;
        }
        return $projects;
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
        $groups = $request->groups;
        $infoProject = $request->content;        
        $project = Project::create(['name' => $infoProject["name"], 'description' => $infoProject["description"], 'color_id' => $infoProject["color"]['id'], 'updated_at' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s')]);
        $project->groups()->attach($groups, ['updated_at' => date('Y-m-d H:i:s'), 'created_at' => date('Y-m-d H:i:s')]);  //Ingresar los nuevos grupos relacionados al proyecto
        return response()->json($project, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        // foreach ($project->groups as $group){
        //     $group->id;
        // }
        $project->groups;
        return $project;
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $groups = $request->groups;
        $infoProject = $request->content;
        // return $infoProject;

        $project->update(['name' => $infoProject["name"], 'description' => $infoProject["description"], 'color_id' => $infoProject["color"]['id']]);
        $project->groups()->detach(); // Eliminar todos los grupos relacionados al proyecto
        $project->groups()->attach($groups, ['updated_at' => date('Y-m-d H:i:s')]);  //Ingresar los nuevos grupos relacionados al proyecto
        return response()->json($project, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return response()->json(null, 204);
    }
}
