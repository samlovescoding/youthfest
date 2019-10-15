<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{asset('/css/app.css')}}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://bootswatch.com/3/lumen/bootstrap.min.css"> --}}
        <style>
          body{
            font-family:"Lato" !important;
          }
        </style>
        <script src="{{asset('/js/app.js')}}"></script>
    </head>
    <body>
      @include('dashboard.navbar')
      <main class="container">
        @include('dashboard.messages')
        @yield('content')
        <br>
      </main>
      @include('dashboard.footer')
    </body>
</html>
