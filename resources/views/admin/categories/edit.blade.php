@extends('admin.templete.main')
@section('title','EditCategoria')
@section('titlepage')
	<i class="fas fa-edit"></i>
	Editar categoria
@endsection

@section('contentpage')
	<form method="POST" action="{{url('/admin/categories',$editCategory->id)}}" accept-charset="UTF-8" enctype="">
		@csrf
		@method('PUT')
		<div class="form-row">
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Nombre de la categoria</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="name" value="{{$editCategory->name}}">
			    </div>
		    </div>
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Actualizar">
	</form>
@endsection
