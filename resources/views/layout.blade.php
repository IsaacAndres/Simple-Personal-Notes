<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Simple Personal Notes</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  <body>

    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <h1 class="page-header text-center">Simple Personal Notes</h1>
        </div>

        @yield('content')

      </div>
    </div>

    <script src="{{ asset('/js/app.js') }}"></script>
  </body>
</html>
