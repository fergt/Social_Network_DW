<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Illuminate\Validation\Rule;

use App\Rules\emailRepetido;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Symfony\Component\VarDumper\VarDumper;
use App\Image;


use App\editar;
    
class PagesController extends Controller {

    public function editar(Request $request){

        $this->validate($request, [
            'keep' => 'required',
        ]);


        return $request;

        return back();
    }


    public function update(Request $request)
    {   

        $id_user = $request->input('id');

        $user = \Auth::user();

        // se validan los datos a actualizar
        $validate = $this->validate($request, [
            
            'name' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'image_path' => ['required','image' ,'mimes:jpg,jpeg,png,gif'],
            'email' => ['required', 'string', 'email', 'max:255', new emailRepetido]
        ]); 
 
        $name = $request->input('name');
        $apellido = $request->input('apellido');
        $email = $request->input('email');
        $fecha_nac = $request->input('fecha_nac');

            $user->name = $name;
            $user->apellido = $apellido;    
            $user->email = $email;
            $user->fecha_nac = $fecha_nac;

            $image_path = $request->file('image_path');
            if($image_path){
                $image_path_name = time().$image_path->getClientOriginalName();
                Storage::disk('users')->put($image_path_name,File::get($image_path));
                $user->image = $image_path_name;
            }

            $user->update();

        return redirect()->route('config')->with('message', 'Usuario actualizado ');        
    }

    public function getImage($fileName){

        $file  = Storage::disk('users')->get($fileName);

        return response($file, 200);
    }


    public function config()
    {   
        return view('usuario.editarusuario');
    }

    public function index()
    {   
        // retorna las publicaciones a mostrar
        $images = Image::orderBy('id_imagen', 'desc')->paginate(10);
        $user = \Auth::user();
        
        return view('Publicaciones.publicaciones')->with('images', $images, 'user', $user);
    }

}