<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css/all.css')}}">
    


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('tail-select/css/bt4/tail.select-default.css')}}">


    <title>@yield('title','Default') | Blog</title>
  </head>
  <body>
    @include('admin.templete.nav')
    
    <section class="m-1">
      <div class="container border border-info">
        <div class="alert alert-primary" role="alert">
          <h1>
            @yield('titlepage','default')
          </h1>
        </div>
        <div class="">
          
            @yield('contentpage')

        </div>
        
      </div>
    </section>
    
  
    @include('admin.templete.footer')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.5.1.js')}}"></script>
    <script src="{{asset('fontawesome/js/all.js')}}"></script>
    
    <script src="{{asset('sweetalert/sweetalert.min.js')}}"></script>
    <section>
      @include('sweet::alert')
      @include('admin.templete.error')
    </section>
    
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('tail-select/js/tail.select-full.js')}}"></script>
    <section>
      @yield('script')
    </section>
  </body>
</html>