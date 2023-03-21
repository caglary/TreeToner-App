<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/css/all.min.css">
    <!-- Scripts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
 
    <link rel="stylesheet" href="/css/custom.css">
  
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href={{asset('/css/buttons.bootstrap4.min.css')}}>
    <!-- Theme style -->
    <link rel="stylesheet" href="/css/adminlte.min.css">
    <link href={{asset('/css/bootstrap.min.css')}} rel="stylesheet">
   
   
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
</head>

<body>
