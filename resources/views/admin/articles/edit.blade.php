@extends('admin.templete.main')
@section('title','CrearArticulo')
@section('titlepage')
	<i class="fas fa-boxes"></i>
	Editar articulo {{$articulo->title}}
@endsection

@section('contentpage')
	<form method="POST" action="{{url('/admin/articles',$articulo->id)}}" accept-charset="UTF-8" enctype="multipart/form-data">
		@method('PUT')
		@csrf
		<div class="form-row">
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Tutulo</label>
			    <div class="col-sm-8">
			      <input value="{{$articulo->title}}" type="text" class="form-control" name="title" required>
			    </div>
		    </div>
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Categoria</label>
		    	<div class="col-sm-8">
			    	<select value="{{$articulo->category_id}}" id="Cate" name="category_id" class="form-control">
			    		@foreach($categorias as $category)
			    		<option value="{{$category->id}}">{{$category->name}}</option>
			    		@endforeach
				    </select>
			    </div>
		    </div>
		    <div class="input-group mr-2 py-2">
		    	<label for="staticName" class="col-sm-4 col-form-label">Contenido</label>
			    <div class="col-sm-8">
			       <textarea name="content" class="form-control" aria-label="With textarea" required>{{$articulo->content}}</textarea>
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
		</div>
	  <input type="submit" class="btn btn-primary btn-lg btn-block" value="Agragar">
	</form>
@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		var Datos = {{$tags}};
		tail.select('#Etiqe',{
			search: true,
		});

		tail.select('#Cate',{
			search: true
		});

		for (var i = 0; i < Datos.length; i++) {
			$('li[data-key="'+Datos[i]+'"]').click();
		}
	});
	
</script>

@endsection