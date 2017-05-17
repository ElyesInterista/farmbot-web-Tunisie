@extends('layouts.farm')
@section('pagename')
    Plant State
@endsection
@section('state')
    active
@endsection
@section('bodyclass')
    freeze
@endsection
@section('addstylesheet')
    <style>
        .wrimagecard {
            margin-top: 0;
            margin-bottom: 1.5rem;
            text-align: left;
            position: relative;
            background: #fff;
            box-shadow: 12px 15px 20px 0px rgba(46, 61, 73, 0.15);
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .wrimagecard .fa {
            position: relative;
            font-size: 70px;
        }

        .wrimagecard-topimage_header {
            padding: 20px;
        }

        a.wrimagecard:hover, .wrimagecard-topimage:hover {
            box-shadow: 2px 4px 8px 0px rgba(46, 61, 73, 0.2);
        }

        .wrimagecard-topimage a {
            width: 100%;
            height: 100%;
            display: block;
        }

        .wrimagecard-topimage_title {
            padding: 20px 24px;
            height: 55px;
            padding-bottom: 0.75rem;
            position: relative;
        }

        .wrimagecard-topimage a {
            border-bottom: none;
            text-decoration: none;
            color: #525c65;
            transition: color 0.3s ease;
        }


    </style>
@endsection
@section('content')
    <br>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                        @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '1')
                            @php
                                $trouver=true;
                            @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><img class="card-img-top"
                                    src="{{asset('images/').'/'.$y['Image']}}"
                                    style="height:70px; width: 70%"
                                    alt="Card image cap"></center>
                        </div>
                         @break;
                         @endif
                        @endforeach
                            @if ($trouver==false)
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            NOT YET
                        </div>
                            @else
                                <div class="wrimagecard-topimage_title">


                                    @if ($state =="")
                                        Today the plant planted
                                    @else
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{floor($y['pourcentage'])}}%">
                                                {{floor($y['pourcentage'])}}%
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            @endif
                        </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                        @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '2')
                            @php
                                $trouver=true;
                            @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><img class="card-img-top"
                                    src="{{asset('images/').'/'.$y['Image']}}"
                                    style="height:70px; width: 70%"
                                    alt="Card image cap"></center>
                        </div>
                         @break;
                         @endif
                        @endforeach
                            @if ($trouver==false)
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            NOT YET
                        </div>
                            @else
                                <div class="wrimagecard-topimage_title">


                                    @if ($state =="")
                                        Today the plant planted
                                    @else
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{$y['pourcentage']}}%">
                                                {{$y['pourcentage']}} %
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            @endif
                        </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                        @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '3')
                            @php
                                $trouver=true;
                            @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><img class="card-img-top"
                                    src="{{asset('images/').'/'.$y['Image']}}"
                                    style="height:70px; width: 70%"
                                    alt="Card image cap"></center>
                        </div>
                         @break;
                         @endif
                        @endforeach
                            @if ($trouver==false)
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            NOT YET
                        </div>
                            @else
                                <div class="wrimagecard-topimage_title">

                                    @if ($state =="")
                                        Today the plant planted
                                    @else
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{$y['pourcentage']}}%">
                                                {{$y['pourcentage']}} %
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            @endif
                        </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                        @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '4')
                            @php
                                $trouver=true;
                            @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><img class="card-img-top"
                                    src="{{asset('images/').'/'.$y['Image']}}"
                                    style="height:70px; width: 70%"
                                    alt="Card image cap"></center>
                        </div>
                         @break;
                         @endif
                        @endforeach
                            @if ($trouver==false)
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            NOT YET
                        </div>
                            @else
                                <div class="wrimagecard-topimage_title">


                                    @if ($state =="")
                                        Today the plant planted
                                    @else
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{$y['pourcentage']}}%">
                                                {{$y['pourcentage']}} %
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            @endif
                        </a>
                </div>
            </div> <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                        @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '5')
                            @php
                                $trouver=true;
                            @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><img class="card-img-top"
                                    src="{{asset('images/').'/'.$y['Image']}}"
                                    style="height:70px; width: 70%"
                                    alt="Card image cap"></center>
                        </div>
                         @break;
                         @endif
                        @endforeach
                            @if ($trouver==false)
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            NOT YET
                        </div>
                            @else
                                <div class="wrimagecard-topimage_title">

                                    @if ($state =="")
                                        Today the plant planted
                                    @else
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{$y['pourcentage']}}%">
                                                {{$y['pourcentage']}} %
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            @endif
                        </a>
                </div>
            </div>
            <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                        @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '6')
                            @php
                                $trouver=true;
                            @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><img class="card-img-top"
                                    src="{{asset('images/').'/'.$y['Image']}}"
                                    style="height:70px; width: 70%"
                                    alt="Card image cap"></center>
                        </div>
                         @break;
                         @endif
                        @endforeach
                            @if ($trouver==false)
                        <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                            <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                        </div>
                        <div class="wrimagecard-topimage_title">
                            NOT YET
                        </div>
                            @else

                                <div class="wrimagecard-topimage_title">

                                    @if ($state =="")
                                        Today the plant planted
                                    @else
                                        <div class="progress">

                                            <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                                 aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                                 style="width:{{$y['pourcentage']}}%">
                                                {{$y['pourcentage']}} %
                                            </div>
                                        </div>

                                    @endif
                                </div>
                            @endif
                        </a>
                </div>
            </div>


            <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '2'  && $y['pivot']['Y'] == '1')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '2'  && $y['pivot']['Y'] == '2')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '2'  && $y['pivot']['Y'] == '3')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '2'  && $y['pivot']['Y'] == '4')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '2'  && $y['pivot']['Y'] == '5')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '2'  && $y['pivot']['Y'] == '6')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '3'  && $y['pivot']['Y'] == '1')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '3'  && $y['pivot']['Y'] == '2')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '3'  && $y['pivot']['Y'] == '3')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '3'  && $y['pivot']['Y'] == '4')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '3'  && $y['pivot']['Y'] == '5')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '1'  && $y['pivot']['Y'] == '6')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{floor($y['pourcentage'])}}%">
                                            {{floor($y['pourcentage'])}}%
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>
 <div class="col-md-2 col-sm-2">
                @php
                    $state="";
                    $trouver=false;
                @endphp
                <div class="wrimagecard wrimagecard-topimage">
                    <a href="#">
                        @foreach($x as $y)
                            @if ($y['pivot']['X'] == '3'  && $y['pivot']['Y'] == '6')
                                @php
                                    $trouver=true;
                                @endphp
                                @if ($y['pourcentage']> 0 && $y['pourcentage']<=15)
                                    @php
                                        $state="danger";
                                    @endphp
                                @elseif($y['pourcentage']>15 && $y['pourcentage']<=40)
                                    @php
                                        $state="warning ";
                                    @endphp
                                @elseif($y['pourcentage']>40 && $y['pourcentage']<=60)
                                    @php
                                        $state="info";
                                    @endphp
                                @elseif ($y['pourcentage']>60 && $y['pourcentage']<=100)
                                    @php
                                        $state="succes";
                                    @endphp
                                @endif

                                <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                    <center><img class="card-img-top"
                                                 src="{{asset('images/').'/'.$y['Image']}}"
                                                 style="height:70px; width: 70%"
                                                 alt="Card image cap"></center>
                                </div>
                                @break;
                            @endif
                        @endforeach
                        @if ($trouver==false)
                            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)">
                                <center><i class="fa fa-leaf" style="color:#16A085"></i></center>
                            </div>
                            <div class="wrimagecard-topimage_title">
                                NOT YET
                            </div>
                        @else

                            <div class="wrimagecard-topimage_title">

                                @if ($state =="")
                                    Today the plant planted
                                @else
                                    <div class="progress">

                                        <div class="progress-bar progress-bar-{{$state}}" role="progressbar"
                                             aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"
                                             style="width:{{$y['pourcentage']}}%">
                                            {{$y['pourcentage']}} %
                                        </div>
                                    </div>

                                @endif
                            </div>
                        @endif
                    </a>
                </div>
            </div>














        </div>
    </div>
@endsection
