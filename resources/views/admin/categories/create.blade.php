@extends('admin.templete.main')
@section('title','CrearCategoria')
@section('titlepage')
	<i class="fas fa-boxes"></i>
	Agregar categoria
@endsection

@section('contentpage')
	<form method="POST" action="{{url('/admin/categories')}}" accept-charset="UTF-8" enctype="">
		{{csrf_field()}}
		<div class="form-row">
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Nombre de la categoria</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="name" required="">
			    </div>
		    </div>
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Agragar">
	</form>
@endsection