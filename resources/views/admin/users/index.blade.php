@extends('admin.templete.main')

@section('title','UserList')
@section('titlepage')
	<i class="fas fa-users"></i>
	Customer list
@endsection

@section('contentpage')
	<div class="container">
		<button class="navbar-toggler float-right">
				<a class="navbar-brand" href="{{url('/admin/users/create')}}">
					<i class="fas fa-user-plus"></i>Agregar
				</a>
		</button>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<thead class="thead-info">
			    <tr class="table-info">
			      <th scope="col">#</th>
			      <th scope="col">Nombres</th>
			      <th scope="col">Correo</th>
			      <th scope="col">Tipo</th>
			      <th scope="col">Action</th>
			    </tr>
			</thead>
			<tbody>
				@foreach($users as $user)
				<tr>
				  <th scope="row">{{$user->id}}</th>
				  <td>{{$user->name}}</td>
				  <td>{{$user->email}}</td>
				  @if($user->type=="admin")
				  	<td><span class="btn btn-danger">{{$user->type}}</span></td>
				  @else
				  	<td><span class="btn btn-primary">{{$user->type}}</span></td>
				  @endif
				  <td>
				  	<a onclick="swalConfirmDelete({{$user->id}})" class="btn btn-danger" >
				  		<i class="fas fa-user-times"></i>
				  	</a>
				  	<a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">
				  		<i class="fas fa-user-edit"></i>
				  	</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$users->render()}}
	</div>
@endsection
@section('script')
	<script type="text/javascript">
      function swalConfirmDelete(dato){
        var id = dato;
        console.log(id);
        swal({
            title: "Esta seguro de eliminar este registro?",
            text: "Si acepta, no podra ser recuperado para futuros tramites",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              location.replace(`http://blog.manye/admin/users/${id}/destroy`)
              
            } else {
              swal("Tu registro esta seguro!");
            }
          });
      }
    </script>
@endsection