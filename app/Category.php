<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Nombre de la tabla
    protected $table = "categories";

    //Columnas para motrar de la tabla
    protected $fillable = ['name'];

    //ralacion con el modelo Article
    public function articles(){
    	return $this->hasMany('App\Article');
    }
}
