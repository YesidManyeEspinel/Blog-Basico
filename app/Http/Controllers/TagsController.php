<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Tag;
use UxWeb\SweetAlert\SweetAlert;

class TagsController extends Controller
{
    public function create (){
    	return view('admin.tags.create');
    }
    public function edit($tag){
    	$editTag = Tag::find($tag);
    	return view('admin.tags.edit')->with('editTag',$editTag);

    }
    Public function update(Request $request,$tag){
    	//
    	$TagUpdate = Tag::find($tag);
    	$TagUpdate->name = $request->name;
    	$TagUpdate->save();
    	alert()->success('Se actualizo '.$TagUpdate->name.' correcamente','ACTUALIZAR');
    	return redirect('admin/tags');
    }
    public function store (TagRequest $request){
    	//
    	$addTag = new Tag($request->all());
    	$addTag->save();
    	alert()->success('Se agrego '.$addTag->name.' correcamente','REGISTRADO');
    	return redirect('admin/tags');

    }
    Public function index(Request $request){
    	//Consultamos al modelo DB Category.php
    	$tag = Tag::Buscart($request->name)->orderby('id','DESC')->paginate(5);
    	//Pasar datos a a la vista 
    	return view('admin.tags.index')->with('tags',$tag);
    }
    public function destroy($id){
    	$deleteTag =Tag::find($id);
    	$deleteTag->delete();
    	alert()->success('Se elimino '.$deleteTag->name.' correcamente','REMOVIDO');
    	return redirect('admin/tags');
    }
}
