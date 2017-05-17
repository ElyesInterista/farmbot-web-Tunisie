@extends('layouts.farm')
@section('pagename')
    Weather State
@endsection
@section('weather')
    active
    @endsection

@section('addstylesheet')
    <link href="{{url('css/ripples.min.css')}}" rel="stylesheet">
    <link href="{{url('css/material-wfont.min.css')}}" rel="stylesheet">
    <link href="{{url('css/flipper.css')}}" rel="stylesheet">
@endsection

@section('addscript')
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{{url('js/ripples.min.js')}}"></script>
    <script src="{{url('js/material.min.js')}}"></script>
    <script src="{{url('js/flipper.js')}}"></script>
@endsection

@section('bodyclass')
freeze
@endsection

@section('content')
    <br>
    <div style=" height: 450px ;overflow-y: scroll" >
        <div class="col-xs-12 col-md-4 full-card">

            <div class="flip-card active-card">
                <div class="card alert-info">
                    <h6 >{{$weather->Temperature}}</h6>
                </div>
                <div class="well">
                    <h1>Temeprature (°C) </h1>
                </div>
            </div>

        </div>

        <!-- Note the "full-card" class which stands for only one card. Add multiple "full-card" for more cards.  -->
        <div     class="col-xs-12 col-md-4 full-card">
            <!-- This will be the card that is active. Note that there should only be one card active. -->

            <div class="flip-card active-card">
                <div class="card" style="background-color: #F1BF26;color: white;">
                    <h6>{{$weather->Wind}}</h6>
                </div>
                <div class="well">
                    <h1>Wind (KM/H)</h1>
                </div>
            </div>
            <div class="flip-card active-card">
                <div class="card alert-success">
                    <h6>{{$weather->Rain}}</h6>
                </div>
                <div class="well">
                    <h1>Rain (MM)</h1>
                </div>
            </div>
        </div>

        <div     class="col-xs-12 col-md-4 full-card">
            <!-- This will be the card that is active. Note that there should only be one card active. -->

            <div class="flip-card active-card">
                <div class="card" style="background-color: #F1BF26;color: white;">
                    <h6>{{$weather->WindDirection}}</h6>
                </div>
                <div class="well">
                    <h1>WindDirection</h1>
                </div>
            </div>
            <div class="flip-card active-card">
                <div class="card alert-success">
                    <h6>{{$weather->Humidity}}</h6>
                </div>
                <div class="well">
                    <h1>Humidity (%)</h1>
                </div>
            </div>
        </div>

    </div>
    <scrip>
        

    </scrip>
@endsection


