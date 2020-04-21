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