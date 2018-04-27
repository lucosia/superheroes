<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta id="csrf-token" name="csrf-token" content="{{ csrf_token() }}" value="{{ csrf_token() }}">

      <title>SuperHeroes</title>

      <!-- Fonts -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
      <link rel="icon" type="image/png" href="/resources/img/superhero.png">

      <!-- Styles -->
      <link href="{{ elixir('resources/css/vendor.css') }}" rel="stylesheet">

      <style>
        body {
            background: url(/resources/img/background.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            height: 100%;
        }

        .customized-panel {
            background: rgba(0,0,0,0.7);
            color:#ffff;
        }

        .customized-modal {
            background-color: rgb(242, 242, 242,0.9);
            /* color:#ff8080; */
        }
      </style>
   </head>
   <body >
       <script src="{{ elixir('resources/js/vendor.js') }}"></script>
       <div id="app">
           @yield('content')

       </div>
     </body>
</html>
