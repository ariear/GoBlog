<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <title>GoBlog</title>
  <Meta Content="Di website ini kamu bisa mendapatkan info seputar teknologi yang menarik" Name="Description"/>
  <meta name="robots" content="noindex,nofollow">
  <style>
      .tembelan{
          width: 0;
      }
      .munculmenu{
          width: 0;
      }
      .aselimenu{
          width: 80vw;
      }
      .aselitemeb{
          width: 100vw;
      }
  </style>
</head>
<body>

@include('component.Navbar')

@yield('container')

@include('component.Footer')
</body>
</html>
