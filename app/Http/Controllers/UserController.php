<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth; 

class UserController extends Controller
{

    public function UserAuth(Request $resquest){       
        $credentials = $resquest->only('email', 'password');       
        $token = null;
        try{
            if(!$token = JWTAuth::attempt($credentials)){
                return response()->json(['error' => 'invalid_credentials']);
            }
        }catch(JWTException $ex){
            return response()-json(['error' => 'something went wrong!'], 500);
        }
        $user = User::where('email',$credentials['email'])->first();
        //$group = $user->group;
        return response()->json(compact('token','user'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = User::all();

        //Retornar todos el grupo del susuario
        foreach ($users as $user){
            $user->group->name;
        }
        
        return $users;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();

        //AGREGAR IMAGEN USUARIO

        //Explotar baseg4 de la imagen
        $exploded = explode(",", $request->picture);

        $decoded = base64_decode($exploded[1]);

        if(str_contains($exploded[0], 'jpeg')){
            $extension = 'jpg';
        }else{
            $extension = 'png';
        }

        $nombre = str_random().".".$extension;

        $path = public_path()."/uploads/".$nombre;

        file_put_contents($path, $decoded);


        
        $usuario = User::create($request->except('picture') + [
            'picture' => $nombre
        ]);

        return response()->json($usuario, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idUser)
    {
        $info = User::findOrFail($idUser)->update($request->all());
        // $usuario->update($request->all());

        return response()->json($info, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(true, 204);
    }

    /**
     * Rerturn every task for user
     * @param int $id
     */
    public function userTasks($id)
    {
        $user = User::findOrFail($id);
        $user->tasks;

        //Retornar todos el grupo del susuario
        // foreach ($user->tasks as $task){
        //     $task->state->name;
        // }
        return response()->json($user, 200);
        
    }
}
