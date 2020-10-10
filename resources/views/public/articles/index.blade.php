@extends('public.templete.app')

@section('Content-Articles')
<div class="container">
	<div class="row">
		<div class="container text-center">
			<!-- Portfolio Section Heading-->
	        <h2 class="text-uppercase">Articulos</h2>
	        <!-- Icon Divider-->
	        <div class="m-2 p-2">
	            ________<i class="fas fa-star"></i>________
	        </div>
	    </div>
		<div class="card-group">
            <!-- Portfolio Item 1-->
            @foreach($articles as $foto)
	        	<div class="col-md-6 col-lg-4">
	                <div class="card m-1">
	                	@foreach($foto->images as $image)
	                		<img src="/images/article/{{$image->name}}" class="card-img-top" width="200" height="300">
	                    @endforeach
	                    <div class="card-body">
	                        <h5 class="card-title">{{$foto->title}}</h5>
	                        <p class="card-text">Categoria: {{$foto->category->name}}</p>
	                        <a href="{{url('articulo',$foto->id)}}" class="btn btn-primary">Ver</a>
	                    </div>
	                    <div class="card-footer">
	                        <small class="text-muted">{{$foto->created_at->diffForHumans()}}</small>
	                    </div>
	                </div>
	            </div>
            @endforeach
        </div>
    </div>{{$articles->render()}}
</div>
@endsection