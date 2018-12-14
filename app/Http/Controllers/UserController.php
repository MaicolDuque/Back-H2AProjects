<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use JWTAuth; 

class UserController extends Controller
{

    public function UserAuth(Request $resquest){       
        $credentials = $resquest->only('email', 'password'); 
        // $pass = bcrypt($resquest->password);  
        // return $pass;
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
        // return $request->all();

        //AGREGAR IMAGEN USUARIO

        //Explotar baseg4 de la imagen
        $exploded = explode(",", $request->picture);

        if(count($exploded)>1){
            $decoded = base64_decode($exploded[1]);
    
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }else{
                $extension = 'png';
            }
    
            $nombre = str_random().".".$extension;
    
            $path = public_path()."/uploads/".$nombre;
    
            file_put_contents($path, $decoded);
        }else{
            $nombre = $request->picture;
        }


        // bcrypt()
        $pass = bcrypt($request->password);        
        // return $pass;
        $usuario = User::create($request->except('picture', 'password') + [
            'picture' => $nombre,
            'password' => $pass
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
        // return $request;
        //Explotar baseg4 de la imagen
        $currentPassword = $request->currentPass;
        $request = $request->info;

        // return $currentPassword;
        $exploded = explode(",", $request['picture']);
        
        if(count($exploded)>1){
            $decoded  = base64_decode($exploded[1]);
            if(str_contains($exploded[0], 'jpeg')){
                $extension = 'jpg';
            }else{
                $extension = 'png';
            }
            $nombre = str_random().".".$extension;
            $path = public_path()."/uploads/".$nombre;
            file_put_contents($path, $decoded);
        }else{
            $nombre = $request['picture'];
        }

        $pass = $currentPassword;
        if($currentPassword != $request['password']){
            $pass = bcrypt($request['password']);
        }
        // $request->password = $pass;
        
        // return $pass;
        $info = User::findOrFail($idUser)->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'group_id' => $request['group_id'],
            'is_admin' => $request['is_admin'],
            'occupation_id' => $request['occupation_id'],
            'state' => $request['state'],
            'updated_at' => date('Y-m-d H:i:s'),
            'picture' => $nombre,
            'password' => $pass
        ]);
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

    /**
     * return usuarios por grupo
     */

     public function usersByGroups(Request $request){        
        $groups = $request->data;
        $users = User::whereIn('group_id', $groups)->get();
        return response()->json($users, 200);
     }


     /**
      * return cantidad de usuarios por grupo
      */

    public function cantUsersByGroup(){   
        $users = User::groupBy('group_id')
                    ->selectRaw('count(*) as total, group_id')
                    ->get();

        foreach ($users as $user) {
            $user->group;
        }
        return response()->json($users, 200);
     
    }
}
