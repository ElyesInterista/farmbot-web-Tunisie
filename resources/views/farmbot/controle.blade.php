@extends('layouts.farm')
@section('pagename')
    Control
@endsection
@section('control')
    active
@endsection

@section('bodyclass')
    freeze
@endsection
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div style=" height: 450px ;overflow-y: scroll">
<div class="all-content-wrapper">
    <div >
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12
                                col-md-offset-1">
                <div>
                    <div class="widget-wrapper">
                        <div class="row">
                            <div class="col-sm-12">
                                <button  id="stop" class="red widget-control button-like
                    red" type="button">E-STOP
                                </button>
                                <div class="widget-header"><h5>Move</h5><i class="fa
                                                        fa-question-circle
                                                        widget-help-icon">
                                        <div class="widget-help-text">Use these manual
                                            control buttons to move FarmBot in realtime. Press
                                            the arrows for relative movements or type in new
                                            coordinates and press GO for an
                                            absolute movement. Tip: Press the Home button when
                                            you are done so FarmBot is ready to get back to
                                            work.
                                        </div>
                                    </i></div>
                            </div>
                            <div class="col-sm-12">
                                <div class="widget-content"><label class="text-center">MOVE AMOUNT</label>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div style="margin-left: 100px;" >
                                                <button id="sp1" class="move-amount no-radius leftmost" onclick="SetSpeed(id,0.5)">Low</button>
                                                <button id="sp4" class="move-amount no-radius move-amount-selected" onclick="SetSpeed(id,1)">Meduim</button>
                                                <button id="sp5" class="move-amount no-radius rightmost" onclick="SetSpeed(id,2)">High</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <table class="jog-table" style="border: 0px;">
                                            <tbody>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <button id="up" class="button-like fa fa-2x arrow-button radius
   fa fa-arrow-up"></button>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <button id="zoom_in" class="button-like fa fa-2x arrow-button radius
    "><i class="fa fa-search-plus" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    {{--<button id="home" class="button-like fa fa-2x arrow-button radius--}}
    {{--fa fa-podcast"><i class="fa fa-arrows" aria-hidden="true"></i></button>--}}
                                                </td>
                                                <td></td>
                                                <td>
                                                    <button id="left" class="button-like fa fa-2x arrow-button radius
    fa-arrow-left"></button>
                                                </td>
                                                <td>
                                                    <button id="down" class="button-like fa fa-2x arrow-button radius
    fa-arrow-down"></button>
                                                </td>
                                                <td>
                                                    <button id="right" class="button-like fa fa-2x arrow-button radius
    fa-arrow-right"></button>
                                                </td>
                                                <td></td>
                                                <td>
                                                    <button id="zoom_out" class="button-like fa fa-2x arrow-button radius
    " ><i class="fa fa-search-minus" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-3"><label>X AXIS</label> <select style="height: 28px;"class="form-control" id="xAxis">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>

                                            </select></div>
                                        <div class="col-xs-3"><label>Y AXIS</label> <select style="height: 28px;"class="form-control" id="yAxis">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                            </select></div>
                                        <div class="col-xs-3"><label>Z AXIS</label> <select  style="height: 28px;"class="form-control" id="zAxis">
                                                <option>1</option>
                                                <option>2</option>

                                            </select></div>
                                        <div class="col-xs-3">
                                            <button ID="GO" class="full-width green button-like go">GO</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                 <!--   <div class="widget-wrapper peripherals-widget">
                        <div class="row">
                            <div>

                                <div class="col-sm-12">
                                    <div class="widget-content"><p>Click "Edit" to add new peripherals.</p>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div>
                    <div class="widget-wrapper webcam-widget">
                        <div class="row">
                            <div class="col-sm-12">
                                <button class="button-like widget-control gray">Edit</button>
                                <div class="widget-header"><h5>Camera</h5><i
                                            class="fa fa-question-circle widget-help-icon">
                                        <div class="widget-help-text">Press the edit button to update
                                            and save your webcam URL.
                                        </div>
                                    </i></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div></div>
                                <div class="webcam-stream-unavailable">

                                    <iframe width="650" height="260" src="">
                                    </iframe>
                                    <text><!-- react-text: 927 -->Camera stream not available.<!-- /react-text --><br>
                                        <!-- react-text: 929 -->Press <!-- /react-text --><b>EDIT</b>
                                        <!-- react-text: 931 --> to add a stream.<!-- /react-text --></text>
                                </div>
                            </div>
                        </div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    </div>





 <script>



     var speed=1;
     function  SetSpeed(id,speedi) {
         speed=speedi;
         $("#"+id).click(function () {

             $(this).addClass("move-amount-selected");

             switch (id) {
                 case "sp1":
                     $("#sp4").removeClass("move-amount-selected");
                     $("#sp5").removeClass("move-amount-selected");
                     break;

                 case "sp4":

                     $("#sp1").removeClass("move-amount-selected");
                     $("#sp5").removeClass("move-amount-selected");
                     console.log("sp4");
                     break;
                 case "sp5":

                     $("#sp4").removeClass("move-amount-selected");
                     $("#sp1").removeClass("move-amount-selected");
                     break;

             }

console.log(speed);
         });
     }
     $( "#up" )
         .mousedown(function() {

             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"up",speed:speed});
         })

         .mouseup(function() {
                 $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"upoff"});
         });


     $( "#down" )
         .mousedown(function() {

                 $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"down",speed:speed});

         })
         .mouseup(function() {
                 $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"downoff"});
         })
         ;
     $( "#left" )
         .mouseup(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"leftoff"})
         })
         .mousedown(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"left",speed:speed})
         });
     $( "#right" )
         .mouseup(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"rightoff"})
         })
         .mousedown(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"right",speed:speed})
         });

     $( "#zoom_in" )
         .mouseup(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"zoom_inoff"})
         })
         .mousedown(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"zoom_in",speed:speed})
         });
     $( "#zoom_out" )
         .mouseup(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"zoom_outoff"
             })
         })
         .mousedown(function() {
             $.post("/farmbot-web/public/Api/SetControlles",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",type:"zoom_out",speed:speed})
         });



$("#GO").click(function() {
$.post("/farmbot-web/public/Api/GoToAxis",{user_id:"{{\Illuminate\Support\Facades\Auth::id()}}",X:$("#xAxis").val(),Y:$("#yAxis").val(),Z:$("#zAxis").val(),speed:speed});
});

     $("#stop").click(function () {
         //if 2 make 3 if not nothing
        $.get("/farmbot-web/public/Api/SetStateControllesFor/{{\Illuminate\Support\Facades\Auth::id()}}/3");
         console.log("stop and close camera");
     });
     $("#sync").click(function () {
         $.get("/farmbot-web/public/Api/SetStateControllesFor/{{\Illuminate\Support\Facades\Auth::id()}}/2");
         console.log("sync and open camera");
     });




 </script>
@endsection
