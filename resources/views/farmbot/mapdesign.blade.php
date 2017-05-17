@extends('layouts.farm')
@section('pagename')
    Designer
@endsection
@section('map')
    active
@endsection
@section('bodyclass')
    freeze
@endsection
@section('addstylesheet')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
@section('content')
    <div class="farm-designer">
        <div class="farm-designer-body">
            <div class="farm-designer-left">
                <br>
                <form class="navbar-form" role="search">
                    <div class="input-group add-on">
                        <input onkeyup="search()" id="myInput" class="form-control" placeholder="Search"
                               name="srch-term" id="srch-term" type="text">
                        <div class="input-group-btn">
                            <button style="line-height:2.0" class="btn btn-default" type="submit"><i
                                        class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <div id="divforfilter" class="card-deck" style="overflow:scroll; width: 300px; height:500px;">
                    <br>


                        @foreach($CurrentGraines as $y)
                        @foreach($AllPlant as $x)
                            @if ($x->id == $y)
                    <div style="float: left;">
                        <div class="card" style="margin-left: 20px; margin-right: 20px;width:100px;border-color: #333;">

                            <div id='{{$x->id}}' class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                         alt="Card image cap"></div>
                            <div class="card-block">
                                <h4 class="card-title">{{$x->Libelle}}</h4>
                            </div>
                        </div>
                    </div>
                            @endif
                        @endforeach
                        @endforeach
                </div>

                //

            </div>

            <div class="farm-designer-map">
                <div class="drop-area" id="drop-area">
                    <table style="   border-spacing: 15px; border-collapse: separate; width:1150px; height:550px;  margin-left: 25px">


@php

$id11 = "";
$id12 = "";
$id13 = "";
$id14 = "";
$id15 = "";
$id16 = "";

$id21 = "";
$id22 = "";
$id23 = "";
$id24 = "";
$id25 = "";
$id26 = "";

$id31 = "";
$id32 = "";
$id33 = "";
$id34 = "";
$id35 = "";
$id36 = "";


@endphp






                        <tr>
                            <td id ="1.1" class="drop" style="border-style:solid; border-radius:10px;width:192px; height: 118px;">



                            @foreach($plantesPlanted as $planted )
                                @if($planted->X == '1' and $planted->Y == '1')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                            @php
                                                $id11 = $x->id;
                                            @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                <button id="supprimer11" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                        type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id11}}')">Remove
                                </button>

                                <button id="11" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                        type="submit
" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id11}}')">Update
                                </button>



                            </td>
                            <td id="1.2" class="drop" style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '1' and $planted->Y == '2')

                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php$id12 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer12" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id12}}')">Remove
                                    </button>

                                    <button id="12" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id12}}')">Update
                                    </button>

                            </td>
                            <td id="1.3" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '1' and $planted->Y == '3')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id13 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer13" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id13}}')">Remove
                                    </button>

                                    <button id="13" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id13}}')">Update
                                    </button>
                            </td>
                            <td id="1.4" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '1' and $planted->Y == '4')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id14 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;

                                    @endif
                                @endforeach
                                    <button id="supprimer14" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id14}}')">Remove
                                    </button>

                                    <button id="14" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id14}}')">Update
                                    </button>
                            </td>
                            <td  id="1.5 "class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '1' and $planted->Y == '5')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php$id15 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer15" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id15 }}')">Remove
                                    </button>

                                    <button id="15" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id15}}')">Update
                                    </button>
                            </td>
                            <td  id="1.6" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '1' and $planted->Y == '6')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php$id16 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer16" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id16}}')">Remove
                                    </button>

                                    <button id="16" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id16}}')">Update
                                    </button>
                            </td>
                        </tr>

                        <tr>
                            <td id="2.1" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '2' and $planted->Y == '1')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id21 = $x->id ;@endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer21" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id21}}')">Remove
                                    </button>

                                    <button id="21" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id21}}')">Update
                                    </button>
                            </td>
                            <td id="2.2" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '2' and $planted->Y == '2')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id22 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer22" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id22}}')">Remove
                                    </button>

                                    <button id="22" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id22}}')">Update
                                    </button>
                            </td>
                            <td id="2.3" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '2' and $planted->Y == '3')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id23 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer23" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id23}}')">Remove
                                    </button>

                                    <button id="23" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id23}}')">Update
                                    </button>
                            </td>
                            <td id="2.4" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '2' and $planted->Y == '4')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id24 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif

                                @endforeach
                                    <button id="supprimer24" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id24}}')">Remove
                                    </button>

                                    <button id="24" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id24}}')">Update
                                    </button>
                            </td>
                            <td id="2.5" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '2' and $planted->Y == '5')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id25 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer25" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id25}}')">Remove
                                    </button>

                                    <button id="25" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id25}}')">Update
                                    </button>
                            </td>
                            <td id="2.6" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '2' and $planted->Y == '6')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id26 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer26" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id26}}')">Remove
                                    </button>

                                    <button id="26" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id26}}')">Update
                                    </button>
                            </td>
                        </tr>

                        <tr>
                            <td  id="3.1" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '3' and $planted->Y == '1')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id31 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer31" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id31}}')">Remove
                                    </button>

                                    <button id="31" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id31}}')">Update
                                    </button>
                            </td>
                            <td ID="3.2" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '3' and $planted->Y == '2')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id32 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer32" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id32}}')">Remove
                                    </button>

                                    <button id="32" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id32}}')">Update
                                    </button>
                            </td>
                            <td id="3.3" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '3' and $planted->Y == '3')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id33 = $x->id; @endphp
                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer33" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id33}}')">Remove
                                    </button>

                                    <button id="33" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id33}}')">Update
                                    </button>
                            </td>
                            <td id="3.4" class="drop"
                                style="border-style:solid; border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '3' and $planted->Y == '4')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id34 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;

                                    @endif
                                @endforeach
                                    <button id="supprimer34" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id34}}')">Remove
                                    </button>

                                    <button id="34" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id34}}')">Update
                                    </button>
                            </td>
                            <td id="3.5" class="drop"
                                style="border-style:solid;  border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '3' and $planted->Y == '5')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                               <span> {{$x->Libelle}} </span>
                                                @php $id35 = $x->id; @endphp



                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach

                                    <button id="supprimer35" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id35}}')">Remove
                                    </button>

                                    <button id="35" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id35}}')">Update
                                    </button>
                            </td>
                            <td id="3.6" class="drop"
                                style="border-style:solid;  border-radius:10px;width:192px; height: 118px;">

                                @foreach($plantesPlanted as $planted )
                                    @if($planted->X == '3' and $planted->Y == '6')
                                        @foreach($AllPlant as $x)
                                            @if($x->id == $planted->Plant_id)
                                            <span>{{$x->Libelle}}</span>
                                                @php $id36 = $x->id; @endphp

                                                <div class="draggable"><img class="card-img-top" src="{{asset('images/').'/'.$x->image}}"
                                                                            alt="Card image cap"></div>
                                            @break;
                                            @endif
                                        @endforeach
                                        @break;
                                    @endif
                                @endforeach
                                    <button id="supprimer36" style="  margin-left: 10px; padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-danger btn-l" onclick="deletePlant(id,'{{$id36}}')">Remove
                                    </button>

                                    <button id="36" style=" margin-left: 10px;padding: inherit;top: 0px;right: 0px;    position: relative; "
                                            type="button" class="btn-primary btn-l" data-toggle="modal" data-target="#myModal"  onclick="UpdatePlant(id,'{{$id36}}')">Update
                                    </button>
                            </td>
                        </tr>


                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button  type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Add or Update Your  Plant Seed </h4>
                                </div>
                                <div class="modal-body">
                                    <select  id="myselect" class="form-control"> @foreach($GrainsTrouver as $x)
                                            <option     value="{{$x->id}}" >{{$x->getLibelleAttribute()}}

                                            </option> @endforeach </select>

                                </div>
                                <div class="modal-footer">
                        <span>
                            <button  id="button" class="btn btn-success" >Confirmer</button>

                        </span>

                                </div>
                            </div>

                        </div>
                    </div>






                </div>
            </div>


        </div>
    </div>



@endsection


@section('addscript')
    <script>

        function search() {
            var input, filter, div, divs, a, i;
            input = document.getElementById("myInput").value;
            div = document.getElementById("divforfilter");
            divs = div.getElementsByClassName("card");
            for (i = 0; i < divs.length; i++) {
                a = divs[i].getElementsByTagName("h4")[0];
                if (a.innerHTML.toUpperCase().indexOf(input.toUpperCase()) > -1) {
                    divs[i].style.display = "";
                } else {
                    divs[i].style.display = "none";
                }
            }
        }



        $('.draggable').draggable({
            revert: "invalid",
            helper: 'clone'
            ,
        });

        var plantToPlant = new Array();

        $('.drop').droppable({
            accept: ".draggable",
            drop: function (event, ui) {
                var droppable = $(this);
                var draggable = ui.draggable;
                // Move draggable into droppable



                if ($(this).find(".draggable").length == 0) {
                    draggable.clone().appendTo(droppable);

                    console.log("droppable  "+droppable.attr("id"));
                    console.log("draggable  "+draggable.attr("id"));

                    var idPlante = draggable.attr("id") ;
                    var Pos =""+droppable.attr("id");

                    plantToPlant.push({idPlante:idPlante,Pos:Pos});

                    console.log(plantToPlant[0]['idPlante']);

                    //window.location.href = "/farmbot-web/public/PlantedPlants/"+idPlante+"/"+Pos.substr(0,1)+"/"+Pos.substr(2,1);

                    //  location.reload();
                }


            },
            drag :function () {
            }


        });



        $( "#sync" ).click(function() {
            var requests = [];
            for (var i = 0; i < plantToPlant.length; i++) {

                requests.push($.get("/farmbot-web/public/PlantedPlants/"+plantToPlant[i]['idPlante']+"/"+plantToPlant[i]['Pos'].substr(0,1)+"/"+plantToPlant[i]['Pos'].substr(2,1)));

            }


            $.when(requests[requests.length]).done(function() {

                location.reload();
            });



        });



        function deletePlant(id,idplante) {

            console.log("X= "+id.substr(9,1)+"Y= "+id.substr(10,1)+"id= "+idplante);
            var parentElement = $('#' + id).parent();
            parentElement.find('div').remove();

            window.location.href = "/farmbot-web/public/PlantedRemove/"+idplante+"/"+id.substr(9,1)+"/"+id.substr(10,1);



        }
        
        function UpdatePlant(a,b)
        {

            $( "#button" ).click(function() {
                var x = $("#myselect option:selected" ).val();

                window.location.href = "/farmbot-web/public/PlantedUpdate/"+x+"/"+a.substr(0,1)+"/"+a.substr(1,1)+"/"+b;



            });

        }



            $("td").each(function() {
                var id = $(this).attr("id");

             if($(this).has("span").length  == 0) {
                 console.log("id is empty " + id);
                 $(this).children("button").hide();
             }
                // compare id to what you want
            });
    </script>
@endsection
