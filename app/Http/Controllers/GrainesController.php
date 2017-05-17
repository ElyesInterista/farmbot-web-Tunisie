<?php

namespace App\Http\Controllers;

use App\Plant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GrainesController extends Controller
{
    public function create()
    {
        $user=User::whereId(Auth::user()->id)->first();
        $plantes = $user->graines()->get(['position','Libelle','Plant_id']);

        $AllPlantes = Plant::all();
        $this->NotifOfFinished();
        return view('graines.index',compact('plantes','AllPlantes'));

    }
    public function AddNewSeed($id_graine ,$pos)
    {
        $user=User::whereId(Auth::user()->id)->first();

        $user->graines()->attach($id_graine,['position' => $pos]);

        return redirect()->route('seeds');

    }
    public function UpdateSeed($id_graine , $pos ,$id_explant)
    {
        $user=User::whereId(Auth::user()->id)->first();


        $user->graines()->wherePivot('position',$pos)->updateExistingPivot($id_explant,['plant_id' => $id_graine]);


        return redirect()->route('seeds');

    }
    public function deleteSeed($id_plant,$pos)
    {
        $user=User::whereId(Auth::user()->id)->first();
        $user->graines()->wherePivot('position',$pos)->detach($id_plant);
        return redirect()->route('seeds');

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
