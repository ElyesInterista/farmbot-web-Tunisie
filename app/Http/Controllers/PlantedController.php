<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlantedController extends Controller
{
    public function create()
    {
        $this->NotifOfFinished();


        $user=User::whereId(Auth::user()->id)->first();

        $plantesPlanted = $user->PlantesPlanted()->get(['X','Y','Plant_id']);

        $AllPlant = Plant::all();



        $FetchGraines = $user->graines()->get(['Plant_id']);

        $GrainsTrouver = $user->graines()->get();

        $array = array();

        foreach ($FetchGraines as $x)
       {
           array_push($array,$x['Plant_id']);

          // return $x['Plant_id'];
       }




        $CurrentGraines=  array_unique($array);

       //  dd($plantesPlanted);
        return view('farmbot.mapdesign',compact('plantesPlanted','AllPlant','CurrentGraines','GrainsTrouver'));

    }
    public function AddNewPlant($id_plant ,$X,$Y)
    {
        $user=User::whereId(Auth::user()->id)->first();

        $user->PlantesPlanted()->attach($id_plant,['X' => $X,'Y' => $Y,'sync'=>false]);

       return redirect()->route('planteds');

    }
    public function UpdatePlanted($id_plant,$X,$Y ,$id_explant)
    {
        $user=User::whereId(Auth::user()->id)->first();


        $user->PlantesPlanted()->wherePivot('X',$X)->wherePivot('Y',$Y)->updateExistingPivot($id_explant,['plant_id' => $id_plant]);


        return redirect()->route('planteds');

    }
    public function delete($id_plant,$X,$Y)
    {
        $user=User::whereId(Auth::user()->id)->first();

        $user->PlantesPlanted()->wherePivot('X',$X)->wherePivot('Y',$Y)->detach($id_plant);

        return redirect()->route('planteds');
    }
    public function NotifOfFinished()
    {
        $user = User::find(Auth::user()->id);
        $a = $user->PlantesPlanted()->wherePivot('sync','1')->get();
        for ($i = 0; $i < count($a); $i++)
        {
            $x[$i]= $a[$i];
            $age=DB::table('plant')->where('id',$a[$i]['pivot']['plant_id'])->get(['Age']);
            $daysfromplanted =date_diff($a[$i]['pivot']['created_at'],new \DateTime())->d;
            $x[$i]['daysPassed'] = $daysfromplanted;
            $x[$i]['Age'] = doubleval(\GuzzleHttp\json_decode($age,true)[0]['Age']);
            $x[$i]['pourcentage'] =($x[$i]['daysPassed']/ $x[$i]['Age'])*100;

            if ($x[$i]['pourcentage'] >= 100) {
                DB::table('planted')->where('id', $a[$i]['pivot']['id'])->update(['sync' => '2']);
            }
        }
    }
}
