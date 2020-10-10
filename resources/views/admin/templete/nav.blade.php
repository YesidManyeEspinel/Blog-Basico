<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="{{url('/home')}}"><i class="fas fa-home"></i>Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    @if(Auth::user())
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      @if(Auth::user()->admin())
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/admin/users')}}">Usuarios<span class="sr-only">(current)</span></a>
      </li>
      @endif
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/categories')}}">Categorias</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/articles')}}">Articulos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('images.showimage')}}">imagenes</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{url('/admin/tags')}}" tabindex="-1" aria-disabled="true">Etiquetas</a>
      </li> 
    </ul>
    @endif

    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}
            <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</nav>