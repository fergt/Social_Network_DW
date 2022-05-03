<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Validation\Rule;
use App\Rules\nickRepetido;
use App\Rules\emailRepetido;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\VarDumper\VarDumper;

use App\editar;
    
class UsuariosController extends Controller {

	 public function __construct()
    {
        $this->middleware('auth');
    }


    //Perfil del usuario
    public function profile($id)
    {
        $user = User::find($id);

        return view('usuario.miperfil')->with('user', $user);
    }


public function index($search = null){

        if($search != null){
            $all_users = User::where('name', 'like', '%'.$search.'%')
                            ->orWhere('email', 'like', '%'.$search.'%')
                            ->orderBy('id', 'desc')
                            ->paginate(10);
        }else{

            $all_users = User::orderBy('id', 'desc')
                            ->paginate(10);
        }
        

        return view('/usuario/usuarios')->with('users', $all_users);
    }

    public function getImage($fileName){

        $file  = Storage::disk('users')->get($fileName);

        return response($file, 200);
    }
    /*

     * @param  array  $data
     * @return \App\User
     */
    protected function createVisita($id)
    {
        //return User::create([
          //  'id_usuario' => $id['id' => $user->id],
         //   'id_usuario_visitante' => $id['id' => $user->id]
        //]);
        console.log("variable");
    }


    public function pagination() {

        $all_users = User::orderBy('id', 'desc')
                            ->paginate(3);
                            // dd($all_users);
        return view('usuario.pagination', compact('all_users'));
        //return redirect()->action('UsuariosController@pagination');

    }


}

