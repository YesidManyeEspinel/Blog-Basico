@extends('admin.templete.main')

@section('title','CategoryList')
@section('titlepage')
	<i class="fas fa-boxes"></i>
	Category list
@endsection

@section('contentpage')
	<!-- Modal -->
	<div class="modal fade" id="ConfirmD" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
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
		<button class="navbar-toggler float-right">
				<a class="navbar-brand" href="{{url('/admin/categories/create')}}">
					<i class="fas fa-plus"></i>Agregar
				</a>
		</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead class="thead-info">
			    <tr class="table-info">
			      <th scope="col">#</th>
			      <th scope="col">Categoria</th>
			      <th scope="col">Action</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($categories as $dato)
				<tr>
				  <th scope="row">{{$dato->id}}</th>
				  <td>{{$dato->name}}</td>
				  <td>
				  	<a onclick="RemoveDato('{{route('categories.destroy',$dato->id)}}');" class="btn btn-danger" data-toggle="modal" data-target="#ConfirmD">
				  		<i class="fas fa-user-times"></i>
				  	</a>
				  	<a href="{{route('categories.edit',$dato->id)}}" class="btn btn-warning">
				  		<i class="fas fa-user-edit"></i>
				  	</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$categories->render()}}
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		function RemoveDato(DatoView,item){
      		console.log(DatoView);
      		$('form').attr({action:DatoView});
      		$('#ConfirmD').modal('show');
      	}
      	$(document).ready(function () {
      		$("button").click(function(){
      			$("#Form-CD").removeAttr("action");
      		});
      	});
    </script>
@endsection