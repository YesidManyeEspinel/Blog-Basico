@extends('admin.templete.main')
@section('title','CrearArticulo')
@section('titlepage')
	<i class="fas fa-boxes"></i>
	Agregar articulo
@endsection

@section('contentpage')
	<form method="POST" action="{{url('/admin/articles')}}" accept-charset="UTF-8" enctype="multipart/form-data">
		@csrf
		<div class="form-row">
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Tutulo</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" name="title" required>
			    </div>
		    </div>
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Categoria</label>
		    	<div class="col-sm-8">
			    	<select id="Cate" name="category_id" class="form-control">
			    		<option value="" disabled selected></option>
			    		@foreach($categorias as $category)
			    		<option value="{{$category->id}}">{{$category->name}}</option>
			    		@endforeach
				    </select>
			    </div>
		    </div>
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Contenido</label>
			    <div class="col-sm-8">
			       <textarea name="content" class="form-control" aria-label="With textarea" required></textarea>
			    </div>
		    </div>
		    
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Etiquetas</label>
		    	<div class="col-sm-8">
			    	<select multiple="multiple" name="tag_id[]" id="Etiqe"  class="form-control" required>
			    		@foreach($etiquetas as $tag)
			    		<option value="{{$tag->id}}">{{$tag->name}}</option>
			    		@endforeach
				    </select>
			    </div>
		    </div>
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Imagen</label>
			    <div class="col-sm-8">
			      <input name="image" type="file" class="form-control" required>
			    </div>
		    </div>
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Agragar">
	</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		tail.select('#Etiqe',{
			search: true
		});
		tail.select('#Cate',{
			search: true
		});
	});
	
</script>

@endsection