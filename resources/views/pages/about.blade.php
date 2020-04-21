<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{config('app.name', 'Weather')}}</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>About</h1>
    </body>
</html>

<!-- 
@extends('layouts.app')
@section('content')
    <h1>About</h1>
    <ul>
        @if(count($team) > 0)
            @foreach($team as $members)
                <li>{{$member}}</li>
            @endforeach
        @endif
    </ul>
@endsection
-->