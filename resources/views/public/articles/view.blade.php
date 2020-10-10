@extends('public.templete.app')

@section('title-articulo')
	{{$view->title}}
@endsection

@section('Content-Articles')
	<div class="row">
		<div class="col-4">
			@foreach($view->images as $image)
        		<img src="/images/article/{{$image->name}}" class="card-img-top" width="200" height="300">
	        @endforeach
		</div>
		<div class="col-8">
			<content class="display-4">
				{{$view->content}}
			</content>
			<div>
				<span>Categotia: {{$view->category->name}}</span>
			</div>
		</div>
	</div>
		
@endsection