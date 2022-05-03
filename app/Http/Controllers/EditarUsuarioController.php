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

class EditarUsuarioController extends Controller {

    public function editar(Request $request){

        $this->validate($request, [
            'keep' => 'required',
        ]);


        return $request;


        return back();
    }

        //Actualizar usuario
    public function update(Request $request)
    {   
        //Usuario de formulario
        $id_user = $request->input('id');

        $user = \Auth::user();

        //Validación de campos de formulario
        $validate = $this->validate($request, [
            
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'image_path' => ['image' ,'mimes:jpg,jpeg,png,gif'],
            'email' => ['required', 'string', 'email', 'max:255', new emailRepetido],
            'descripcion' => ['required', 'string', 'max:255']
        ]);

        $message = [
            'image_path.mimes' => 'el tipo de imagen debe ser: jpg,jpeg,png,gif'
        ];

        //Variables con datos de request formulario   
        $name = $request->input('name');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $fecha_nac = $request->input('fecha_nac');
        $descripcion = $request->input('descripcion');

            $user->name = $name;
            $user->apellido = $apellido;    
            $user->email = $email;
            $user->fecha_nac = $fecha_nac;
            $user->descripcion = $descripcion;

            //Subir imagen de avatar de usuario
            $image_path = $request->file('image_path');
            if($image_path){
                $image_path_name = time().$image_path->getClientOriginalName();
                Storage::disk('users')->put($image_path_name,File::get($image_path));
                $user->image = $image_path_name;
            }

            $user->update();

        return redirect()->route('home')->with('message', 'Los datos de usuario, se han actualizado.');        
    }
}       