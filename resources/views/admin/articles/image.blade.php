@extends('admin.templete.main')

@section('title','ArticlesList')
@section('titlepage')
	<i class="fas fa-boxes"></i>
	Imagenes
@endsection

@section('contentpage')
	<div class="row">
		<div class="card-group">
			@foreach($fotos as $foto)
				<div class="col-sm col-md-4">
					<div class="card m-1">
						<img src="/images/article/{{$foto->name}}" class="card-img-top" width="200" height="300">
						<div class="card-body">
							<h5 class="card-title">{{$foto->article->title}}</h5>
							<p class="card-text">No hay texto</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
					  </div>
					  <div class="card-footer">
					  	<small class="text-muted">Last updated 3 mins ago</small>
					  </div>
					</div>
				</div>
			@endforeach
		</div>
		{{$fotos->render()}}
	</div>
@endsection