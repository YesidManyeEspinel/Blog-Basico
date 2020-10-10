@extends('public.templete.app')

@section('title-articulo')
	Error 401
@endsection

@section('Content-Articles')

<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">401</span>
                <div class="mb-4 lead">{{ $exception->getMessage() }}</div>
                <a href="/home" class="btn btn-link">Back to Home</a>
            </div>
        </div>
    </div>
</div>

@endsection