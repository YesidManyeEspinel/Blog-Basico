<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Nombre de la tabla
    protected $table = "articles";

    //Columnas para motrar de la tabla
    protected $fillable = ['title','content','category_id','user_id'];

    public function scopeBuscara($query, $name)
    {
        return $query->where('title', 'LIKE', "%$name%");
    }

    //relacion con el modelo category
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
    
    public function images(){
    	return $this->hasMany('App\Image');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tag');
    }
}
