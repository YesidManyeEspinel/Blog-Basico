<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //Nombre de la tabla
    protected $table = "tags";

    //Columnas para motrar de la tabla
    protected $fillable = ['name'];

    public function articles(){
    	return $this->belongsToMany('App\Article');
    }

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuscart($query, $name)
    {
        return $query->where('name', 'LIKE', "%$name%");
    }

}
