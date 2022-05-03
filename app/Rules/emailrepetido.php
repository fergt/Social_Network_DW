<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class emailRepetido implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $valor = true;
        $id = auth()->user()->id;

        $user = DB::table('users')
        ->select('email')
        ->whereNotIn('id', array($id))
        ->where('email', '=', $value)
        ->get();

        if(count($user) == 0){

             return $valor;
         }else{
             $valor = false;

             return $valor;
 
         }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El email ya se encuentra registrado.';
    }
}
