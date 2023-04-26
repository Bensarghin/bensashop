<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontoffice/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontoffice/css/all.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('backoffice/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('backoffice/css/images.css')}}">
    <link rel="stylesheet" href="{{asset('backoffice/css/select2.min.css')}}"/>
</head>
<body>
    
    <div id="app">
        <nav class="navbar bg-body-tertiary border-bottom">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <ul class="nav  ms-auto">
                <li class="nav-item mx-3">
                    <a href="" class="btn btn-primary position-relative">
                        <i class="fa-solid fa-bell"></i> 
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            {{$orders->count()}}
                        <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item mx-3 dropstart">
                    <a href="#" class="btn btn-primary dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa-solid fa-user"></i></a>
                    <ul class="dropdown-menu">
                        <li><h5 class="dropdown-header">{{Auth::user()->name}}</h5></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('admin.user.edit')}}"><i class="fa-solid fa-user-lock"></i><span class="d-inline mx-2"> Authent </span></a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa-solid fa-right-from-bracket"></i><span class="d-inline mx-2"> Logout </span></a>
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
              </ul>
            </div>
        </nav>
        @include('backoffice.layouts.sidebar')