<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $primaryKey = 'id_imagen';

    //relacion uno a muchos

    protected $fillable = ['fk_id_user', 'imagen_path', 'descripcion', 'creado', 'actualizado'];

    //Relación de muchos a uno
    public function user(){
        return $this->belongsTo('App\User', 'fk_id_user', 'id');
    }
   
}
