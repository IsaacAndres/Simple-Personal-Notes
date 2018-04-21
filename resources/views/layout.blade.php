<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Personal Notes</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  <body>

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ url('/notes') }}">Notas</a></li>
                        <li><a href="{{ url('/groups') }}">Grupos</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Cerrar sesión
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
      <div class="row">
        {{-- <div class="col-xs-12">
          <h1 class="page-header text-center">Simple Personal Notes</h1>
        </div> --}}

        @yield('content')

      </div>
    </div>

    <footer>
      <div class="container">
        <small>{{ config('app.name') }}. 2018</small>
      </div>
    </footer>

    <script src="{{ asset('/js/app.js') }}"></script>
    {{-- <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script> --}}
    <script src="{{ asset ('sweetalert/sweetalert.min.js') }}"></script>
    @include('sweet::alert')
    @yield('scripts')
  </body>
</html>
