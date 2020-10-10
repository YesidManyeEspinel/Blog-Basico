<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Nombre de la tabla
    protected $table = "images";

    //Columnas para motrar de la tabla
    protected $fillable = ['name','article_id'];

    public function article(){
    	return $this->belongsTo('App\Article');
    }
}
