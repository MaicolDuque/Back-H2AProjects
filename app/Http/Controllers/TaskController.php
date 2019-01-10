<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use App\Mail\EmailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }



    public function tasksGroup($idGrupo){ //Retonar las tareas con sus repectivos grupos
        $tasks = Task::leftJoin('sections', 'tasks.section_id', '=', 'sections.id')
        ->leftJoin('projects', 'sections.project_id', '=', 'projects.id') 
        ->leftJoin('group_projects', 'projects.id', '=', 'group_projects.project_id')                
        ->select('tasks.id as id','tasks.name as task','tasks.state_id', 'group_projects.group_id as grupo')              
        // ->groupBy('projects.id')
        ->where('group_projects.group_id', '=', $idGrupo)
        ->get();

        return $tasks;
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       //Recuperar infromación del usuario al que se le asignó la tarea
       $infoUser = User::findOrFail($request->user_id);        
                
       $data = array(
           'user' => $infoUser,
           'task' => $request->all()
       );

               
       // Enviar correo al usuario
       Mail::to($infoUser->email)->send(new EmailController($data));


        $task = Task::create($request->all());

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return $task;
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        // return $request;
        // $request->except('picture')   

        //Recuperar infromación del usuario al que se le asignó la tarea
        $infoUser = User::findOrFail($request->user_id);        
                
        $data = array(
            'user' => $infoUser,
            'task' => $request->all()
        );

                
        // Enviar correo al usuario
        Mail::to($infoUser->email)->send(new EmailController($data));

        // Mail::send('emails.tareas', $data, function ($message){
        //     $message->subject('Aqui va el mensaje del asunto del email ');
        //     $message->to($infoUser->emai);
        // });


        $task->update($request->all());

        return response()->json($task, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
