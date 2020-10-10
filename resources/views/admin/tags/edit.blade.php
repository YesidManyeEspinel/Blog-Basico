@extends('admin.templete.main')
@section('title','EditTag')
@section('titlepage')
	<i class="fas fa-edit"></i>
	Editar etiqueta {{$editTag->name}}
@endsection

@section('contentpage')
	<form method="POST" action="{{url('/admin/tags',$editTag->id)}}" accept-charset="UTF-8" enctype="">
		@csrf
		@method('PUT')
		<div class="form-row">
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Nombre de la categoria</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="name" value="{{$editTag->name}}">
			    </div>
		    </div>
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Actualizar">
	</form>
@endsection