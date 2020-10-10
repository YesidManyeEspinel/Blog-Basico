<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Category;
use UxWeb\SweetAlert\SweetAlert;

class CategoriesController extends Controller
{
    //
    public function create (){
    	//
    	return view('admin.categories.create');
    }
    public function edit($category){
    	$editCategory = Category::find($category);
    	return view('admin.categories.edit')->with('editCategory',$editCategory);

    }
    Public function update(Request $request,$category){
    	//
    	$CategoryUpdate = Category::find($category);
    	$CategoryUpdate->name = $request->name;
    	$CategoryUpdate->save();
    	alert()->success('Se actualizo '.$CategoryUpdate->name.' correcamente','ACTUALIZAR');
    	return redirect('admin/categories');
    }
    public function store (CategoryRequest $request){
    	//
        //dd($request);

    	$addCategory = new Category($request->all());
    	$addCategory->save();
    	alert()->success('Se agrego '.$addCategory->name.' correcamente','REGISTRADO');
    	return redirect('admin/categories');

    }
    Public function index(){
    	//Consultamos al modelo DB Category.php
    	$category = Category::orderby('id','ASC')->paginate(5);
    	//Pasar datos a a la vista 
    	return view('admin.categories.index')->with('categories',$category);
    }
    public function destroy($id){
    	$deleteCategory =Category::find($id);
    	$deleteCategory->delete();
    	alert()->success('Se elimino '.$deleteCategory->name.' correcamente','REMOVIDO');
    	return redirect('admin/categories');
    }
}
