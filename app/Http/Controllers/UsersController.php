<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use UxWeb\SweetAlert\SweetAlert;



class UsersController extends Controller
{
    //
    Public function index(){
    	//Consultamos al modelo DB User.php
    	$users = User::orderby('id','ASC')->paginate(5);
    	//Pasar datos a a la vista 
    	return view('admin.users.index')->with('users',$users);
    }
    Public function create(){
    	//
    	return view('admin.users.create');
    }
    /*
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    Public function store(UserRequest $request){
    	
    	$adduser = new User($request->all());
    	$adduser->password = bcrypt($request->password);
    	$adduser->save();
    	alert()->success('Se agrego '.$adduser->name.' correcamente','REGISTRADO');
    	return redirect('admin/users');
    }
    Public function show($id){
    	//
    }
    Public function edit($id){
    	//
    	$editUser = User::find($id);
    	return view('admin.users.edit')->with('editUser',$editUser);
    	
    }
    Public function update(Request $request,$id){
    	//
    	$userUpdate = User::find($id);
    	$userUpdate->name = $request->name;
    	$userUpdate->email = $request->email;
    	$userUpdate->type = $request->type;
    	$userUpdate->save();
    	alert()->success('Se actualizo '.$userUpdate->name.' correcamente','ACTUALIZAR');
    	return redirect('admin/users');
    }            
    Public function destroy($id){
    	//
    	$deleteUser =User::find($id);
    	//dd($deleteUser);
    	$deleteUser->delete();
    	alert()->success('Se elimino '.$deleteUser->name.' correcamente','REMOVIDO');
    	return redirect('admin/users');
    }
}
