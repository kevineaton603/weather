@extends('layouts.app')
@section('content')
    <div class="navbar navbar-light bg-light">
        <h1>Welcome to my Weather App!</h1>
        <div class="btn-group">
            <button type="button" class="btn btn-secondary" id="temp-measure-f" onclick='convert({!! json_encode($weather) !!}, "F")'>&#870; F</button>
            <button type="button" class="btn btn-secondary" id="temp-measure-c" onclick='convert({!! json_encode($weather) !!}, "C")'>&#870; C</button>
        </div>
    </div>
    <div class="container-fluid" >
        @if($weather)
        <div class="full-grid">
            <div class="weather-grid">
                <img class="weather-img" src='http://openweathermap.org/img/wn/{{$weather->weather[0]->icon}}.png' class="img-fluid" alt="Responsive image" />
                <div class="weather-container">
                    <h2>{{$weather->weather[0]->main}}</h2>
                    <h3>{{$weather->weather[0]->description}}</h3>
                    <h4>{{$weather->name}}, {{$weather->sys->country}}</h4>
                </div>
            </div>
            <div class="temp-grid">
                <div class="temp-container">
                    <div>Temp</div>
                    <div id="temp">{{$weather->main->temp}} &#870;</div>
                </div>
                <div class="feels-like-container">
                    <div>Feels Like</div>
                    <div id="feels_like">{{$weather->main->feels_like}} &#870;</div>    
                </div>
                <div class="temp-min-container">
                    <div>Max</div>
                    <div id="temp_max">{{$weather->main->temp_max}} &#870;</div>
                </div>
                <div class="temp-max-container">
                    <div>Min</div>
                    <div id="temp_min">{{$weather->main->temp_min}} &#870;</div>
                </div>
            </div>
        </div>
            
        @endif
    </div>
    <script src="js/index.js" type="text/javascript"></script>
    
    <script type="text/javascript">
        convert({!! json_encode($weather) !!}, {!! json_encode(Cookie::get("temp_unit", "C")) !!})
    </script>
    <style>
        .full-grid{
            display: grid;
            grid-template-areas: 
                "weather"
                "temp";
            height: 85vh;
        }

        .weather-grid{
            grid-area: weather;
            display: grid;
            grid-template-areas:
                "img desc"
                "img desc";
        }

        .weather-container{
            grid-area: desc;
            align-self: center;
        }

        .weather-img{
            grid-area: img;
            justify-self: center;
            align-self: center;
        }
        .temp-grid{
            display: grid;
            grid-area: temp;
            grid-template-areas: 
            "temp feels-like min max"
        }

        .temp-container{
            grid-area: temp;
        }

        .feels-like-container{
            grid-area: feels-like;
        }

        .temp-min-container{
            grid-area: min;
        }

        .temp-max-container{
            grid-area: max;
        }

    </style>
@endsection