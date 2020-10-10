@extends('admin.templete.main')
@section('title','CrearUsuario')
@section('titlepage')
	<i class="fas fa-user-plus"></i>
	Registrar Usuario
@endsection

@section('contentpage')
	<form method="POST" action="{{url('/admin/users')}}" accept-charset="UTF-8" enctype="">
		{{csrf_field()}}
		<div class="form-row">
		    <div class="col input-group">
		    	<label for="staticName" class="col-sm-2 col-form-label">Nombre</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="name" placeholder="Nombres completos" required="">
			    </div>
		    </div>
		    <div class="col input-group">
		    	<label for="staticEmail" class="col-sm-2 col-form-label">Correo</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" name="email" placeholder="email@example.com" required="">
			    </div>
		    </div>
		</div>
	    <div class="form-row">
		    <div class="col input-group">
		    	<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
			    <div class="col-sm-10">
			      <input type="password" class="form-control" name="password" required="">
			    </div>
		    </div>
		    <div class="col input-group">
		    	<label for="selectType" class="col-sm-2 col-form-label">Tipo</label>
		    	<div class="col-sm-10">
			    	<select name="type" id="type" class="form-control" required="">
				      <option value="">Seleccione</option>
				      <option value="member">Miembro</option>
				      <option value="admin">Administrador</option>
				    </select>
			    </div>
		    </div>
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Agragar">
	</form>
@endsection
