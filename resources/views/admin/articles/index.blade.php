@extends('admin.templete.main')

@section('title','ArticlesList')
@section('titlepage')
	<i class="fas fa-boxes"></i>
	Articles list
@endsection

@section('contentpage')
	<!-- Modal -->
	<div class="modal fade" id="ConfirmDT" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content" id="Manye">
	      <div class="modal-header">
	        <h4 class="modal-title" id="exampleModalLabel">Esta seguro de eliminar este registro?</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form method="POST">
	      <div class="modal-body">
	       		<h6>Si acepta, no podra ser recuperado para futuros tramites</h6>
	       			@csrf
					@method('DELETE')			  			
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-danger">Ok</button>
	      </div>
	    </form>
	    </div>
	  </div>
	</div>
	<!-- EndModal -->
	<div class="container">
		<form method="GET" action="{{url('/admin/articles')}}">
			<div class="form-row ">
				<div class="col">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<div class="input-group-text"><i class="fas fa-search"></i></div>
						</div>
						<input type="text" name="title" class="form-control" placeholder="Buscar tag...">
					</div>
				</div>
				<button class="navbar-toggler float-right ">
				<a class="navbar-brand" href="{{url('/admin/articles/create')}}">
					<i class="fas fa-plus"></i>Agregar
				</a>
				</button>
			</div>
		</form>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead class="thead-info">
			    <tr class="table-info">
			      <th scope="col">#</th>
			      <th scope="col">Titulo</th>
			      <th scope="col">Categotia</th>
			      <th scope="col">User</th>
			      <th scope="col">Action</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($articles as $dato)
				<tr>
				  <th scope="row">{{$dato->id}}</th>
				  <td>{{$dato->title}}</td>
				  <td>{{$dato->category->name}}</td>
				  <td>{{$dato->user->name}}</td>
				  <td>
				  	<a onclick="RemoveDato('{{route('articles.destroy',$dato->id)}}');" class="btn btn-danger" data-toggle="modal" data-target="#ConfirmDT">
				  		<i class="fas fa-user-times"></i>
				  	</a>           
				  	<a href="{{route('articles.edit',$dato->id)}}" class="btn btn-warning">
				  		<i class="fas fa-user-edit"></i>
				  	</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$articles->render()}}
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		function RemoveDato(DatoView){
      		console.log(DatoView);
      		//$('#Manye').select($('form').attr({action:DatoView}));
      		$('#Manye > form').attr({action:DatoView});
      		$('#ConfirmDT').modal('show');
      	}
      	$(document).ready(function () {
      		$(".btn-secondary").click(function(){
      			$('#Manye > form').removeAttr("action");
      		});
      	});
    </script>
@endsection