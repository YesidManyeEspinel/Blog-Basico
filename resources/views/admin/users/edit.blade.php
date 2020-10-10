@extends('admin.templete.main')
@section('title','EditUser')
@section('titlepage')
	<i class="fas fa-user-edit"></i>
	Editar Usuario {{$editUser->name}}
@endsection

@section('contentpage')
	<form method="POST" action="{{url('admin/users',$editUser->id)}}" accept-charset="UTF-8" enctype="">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PUT">
		<div class="form-row">
		    <div class="col input-group">
		    	<label for="staticName" class="col-sm-2 col-form-label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="name" value="{{$editUser->name}}" required="">
			    </div>
		    </div>
		</div>
		<div class="form-row">
		    <div class="col input-group">
		    	<label for="staticEmail" class="col-sm-2 col-form-label">Correo</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" name="email" value="{{$editUser->email}}" required="">
			    </div>
		    </div>
		</div>
	    <div class="form-row">
		    <div class="col input-group">
		    	<label for="selectType" class="col-sm-2 col-form-label">Tipo</label>
		    	<div class="col-sm-10">
			    	<select name="type" id="type" class="form-control" value="{{$editUser->type}}" required="">
				      <option value="">Seleccione</option>
				      <option value="member">Miembro</option>
				      <option value="admin">Administrador</option>
				    </select>
			    </div>
		    </div>
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Editar">
	</form>
@endsection