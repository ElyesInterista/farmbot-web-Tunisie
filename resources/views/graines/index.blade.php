@extends('layouts.farm')
@section('pagename')
    Add Seed
@endsection
@section('Seeds')
    active
@endsection
@section('addstylesheet')
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

    <style>

        #feedback {
            position: fixed;
            left: 0;
            bottom: 0;
            height: 250px;
            margin-left: -3px;
            margin-bottom: -3px;
        }

        #feedback-form {
            float: left;
            width: 300px;
            height: 100%;
            z-index: 1000;
            padding-left: 5px;
            padding-right: 10px;
            border: 1px solid rgba(0,0,0,.2);
            -moz-border-radius: 0px;
            -webkit-border-radius: 0px;
            border-radius: 0px;
            -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
            box-shadow: 0 5px 10px rgba(0,0,0,.2);
        }

        #feedback-tab {
            float: right;
            color: #fff;
            font-size: 20px;
            cursor: pointer;
            text-align: center;
            width: 120px;
            height: 42px;
            background-color: rgba(0,0,0,0.5);
            margin-top: 60px;
            margin-left: -42px;
            padding-top: 5px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
        }

        #feedback-tab:hover {
            background-color: rgba(0,0,0,0.4);
        }

        #feedback-form textarea {
            resize: none;
        }
    </style>
@endsection
@section('bodyclass')
    freeze
@endsection

@section('content')


    <br>
    <table border="2px">
        <tr>
            <td><h5>AO</h5></td>
            <td><h5>A1</h5></td>
            <td><h5>A2</h5></td>
            <td><h5>A3</h5></td>
            <td><h5>A4</h5></td>
        </tr>
        <tr>

                @php
                    $Pos1 = 'NOT YET';
                    $Pos2 = 'NOT YET';
                    $Pos3 = 'NOT YET';
                    $Pos4 = 'NOT YET';
                    $Pos5 = 'NOT YET';
                @endphp
                @foreach($plantes as $plante)
                    @if($plante->position == 'A0' )
                        @php
                             $Pos1 = $plante->Libelle;
                             $idPos1 = $plante->Plant_id;

                        @endphp

                    @endif

                    @if($plante->position == 'A1' )
                        @php
                            $Pos2 = $plante->Libelle;
                             $idPos2 = $plante->Plant_id;

                        @endphp

                    @endif

                    @if($plante->position == 'A2' )
                        @php
                            $Pos3 = $plante->Libelle;
                            $idPos3 = $plante->Plant_id;

                        @endphp

                    @endif

                    @if($plante->position == 'A3' )
                        @php
                            $Pos4 = $plante->Libelle;
                             $idPos4 = $plante->Plant_id;

                        @endphp

                    @endif
                    @if($plante->position == 'A4' )
                        @php
                            $Pos5 = $plante->Libelle;
                            $idPos5 = $plante->Plant_id;

                        @endphp

                    @endif
                @endforeach

            <td>

                @if($Pos1 != "NOT YET")

                   {!! $Pos1!!}<button  style="margin-left: 10px;" onclick="Delete('A0','{!! $idPos1 !!}')"  type="submit"  class="btn btn-danger">Remove</button> <button onclick="Update('A0','{!! $idPos1 !!}')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-primary">Update</button>
                @else
                    {!! $Pos1!!} <button onclick="AddOrUpdate('A0')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-success">Add</button>

                @endif
            </td>

            <td> @if($Pos2 != "NOT YET")

                    {!! $Pos2!!}<button style="margin-left: 10px;"  onclick="Delete('A1','{!! $idPos2 !!}')"  type="submit"  class="btn btn-danger">Remove</button> <button onclick="Update('A1','{!! $idPos2 !!}')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-primary">Update</button>
                @else
                    {!! $Pos2!!} <button  onclick="AddOrUpdate('A1')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-success">Add</button>

            @endif
            <td> @if($Pos3 != "NOT YET")

                    {!! $Pos3!!} <button   style="margin-left: 10px;" onclick="Delete('A2','{!! $idPos3 !!}')"  type="submit"  class="btn btn-danger">Remove</button><button onclick="Update('A2','{!! $idPos3 !!}')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-primary">Update</button>
                @else
                    {!! $Pos3!!} <button onclick="AddOrUpdate('A2')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-success">Add</button>

            @endif
            <td>@if($Pos4 != "NOT YET")

                    {!! $Pos4!!} <button  style="margin-left: 10px;" onclick="Delete('A3','{!! $idPos4 !!}')"  type="submit"  class="btn btn-danger">Remove</button><button onclick="Update('A3','{!! $idPos4 !!}')"  data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-primary">Update</button>
                @else
                    {!! $Pos4!!} <button onclick="AddOrUpdate('A3')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-success">Add</button>

                @endif</td>
            <td>@if($Pos5 != "NOT YET")

                    {!! $Pos5!!}  <button  style="margin-left: 10px;" onclick="Delete('A4','{!! $idPos5 !!}')"  type="submit"  class="btn btn-danger">Remove</button> <button  onclick="Update('A4','{!! $idPos5 !!}')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-primary">Update</button>
                @else
                    {!! $Pos5!!} <button  onclick="AddOrUpdate('A4')" data-toggle="modal" data-target="#myModal" type="submit"  class="btn btn-success">Add</button>

                @endif</td>

        </tr>

    </table>
    <br>
        <!-- Trigger the modal with a button  data-toggle="modal" data-target="#myModal"-->

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button  type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add or Update Your  Plant Seed </h4>
                    </div>
                    <div class="modal-body">
                        <select  id="myselect" class="form-control"> @foreach($AllPlantes as $x)
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
    <div id="feedback">
        <div id="feedback-form" style='display:none;' class="col-xs-4 col-md-4 panel panel-default">
            <form class="form panel-body" role="form">
                <div class="form-group">
                </div>
                <div class="form-group">
                    <textarea  id="textareaid" class="form-control" name="body" required placeholder="Please write ThePlant You want to add ..." rows="5"></textarea>
                </div>
                <button id="btnadd" class="btn btn-primary pull-right" type="submit">Send</button>
            </form>
        </div>
        <div id="feedback-tab">Suggestion</div>
    </div>

    <div hidden class="alert alert-info fade in" id="bsalert">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Info!</strong> This alert box could indicate a neutral informative or action
    </div>
    <script>



  function AddOrUpdate(pos) {
      $( "#button" ).click(function() {

   var x = $("#myselect option:selected" ).val();

          window.location.href = "/farmbot-web/public/SeedsPlace/"+x+"/"+pos;


      });
  }


  $( "#btnadd" ).click(function() {

      $.post("/farmbot-web/public/SendMail",{text:$( "#textareaid" ).val()});

      setTimeout(function(){
          $( "#textareaid" ).val("");
      }, 2000);
  });

  function Update(pos,idexplant) {


      console.log("pos ="+pos+" dexplant ="+idexplant);

      $( "#button" ).click(function() {
          var x = $("#myselect option:selected" ).val();


          console.log("pos= "+pos+" dexplant= "+idexplant+" x= "+x);
 window.location.href = "/farmbot-web/public/UpdateSeedsPlace/"+x+"/"+pos+"/"+idexplant;

      });

  }
  function Delete (pos,idplante) {

      console.log("pos = "+pos+"idplante = "+idplante);

      window.location.href = "/farmbot-web/public/SeedRemove/"+idplante+"/"+pos;

  }



  //feedback
  $(function() {
      $("#feedback-tab").click(function() {
          $("#feedback-form").toggle("slide");
      });

      $("#feedback-form form").on('submit', function(event) {
          var $form = $(this);
          $.ajax({
              type: $form.attr('method'),
              url: $form.attr('action'),
              data: $form.serialize(),
              success: function() {
                  $("#feedback-form").toggle("slide").find("textarea").val('');
              }
          });
          event.preventDefault();
      });
  });





    </script>

@endsection


