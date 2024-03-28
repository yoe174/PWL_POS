@extends('adminlte::page')

@section('title')
{{ config('adminlte.title') }}
@hasSection('subtitle')
| @yield('subtitle')
@endif
@stop

@vite('resources/js/app.js')

@section('content_header')
@hasSection('content_header_title')
<h1 class="text-muted">
    @yield('content_header_title')

    @hasSection('content_header_subtitle')
    <small class="text-dark">
        <i class="fas fa-xs fa-angle-right text-muted"></i>
        @yield('content_header_subtitle')
    </small>
    @endif
</h1>
@endif
@stop

{{-- <!DOCTYPE html> 
<html> 
    <head> 
        <title>CRUD Laravel</title> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> 
    </head> 
    <body> 
        <div class="container"> 
            @yield('content') 
        </div> 
    </body> 
</html>  --}}