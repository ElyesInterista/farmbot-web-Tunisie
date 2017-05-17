<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\weather;
use App\Plant;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class FarmController extends Controller
{

    public function indexmap()
    {
        $this->NotifOfFinished();

        return view('farmbot.mapdesign');
    }
    public function indexcontrole()
    {
        $this->NotifOfFinished();

        return view('farmbot.controle');
    }
    public function indexstate()

    {
        $this->NotifOfFinished();
        $user = User::whereId(Auth::id())->first();
        $a = $user->PlantesPlanted()->where('sync','1')->orWhere('sync','0')->get();
        for ($i = 0; $i < count($a); $i++)
        {
            $x[$i]= $a[$i];
            $age=DB::table('plant')->where('id',$a[$i]['pivot']['plant_id'])->get(['Age']);
            $daysfromplanted =date_diff($a[$i]['pivot']['created_at'],new \DateTime())->d;
            $x[$i]['daysPassed'] = $daysfromplanted;
            $x[$i]['Age'] = doubleval(\GuzzleHttp\json_decode($age,true)[0]['Age']);
            $x[$i]['pourcentage'] =($x[$i]['daysPassed']/ $x[$i]['Age'])*100;
        }
      //  return json_encode($x,true);

        return view('farmbot.state',compact('x'));
    }
    public function indexweather()
    {
        $this->NotifOfFinished();

        $weather = weather::whereUser_id(Auth::id())->first();

        return view('farmbot.weather', compact('weather'));
    }
    public function getWeatherApi($id)
    {
        $weather = weather::whereUser_id($id)->first();

        $user = User::find($id);

        $windDirection = null;

        if ($weather->getWindDirectionAttribute() == 0)
            $windDirection = "North";

        else if ($weather->getWindDirectionAttribute() > 0 && $weather->getWindDirectionAttribute() < 90)
            $windDirection = "North/East";

        else if ($weather->getWindDirectionAttribute() == 90)
            $windDirection = "East";

        else if ($weather->getWindDirectionAttribute() > 90 && $weather->getWindDirectionAttribute() < 180)
            $windDirection = "South/East";

        else if ($weather->getWindDirectionAttribute() == 180)
            $windDirection = "South";

        else if ($weather->getWindDirectionAttribute() > 180 && $weather->getWindDirectionAttribute() < 270)
            $windDirection = "South/West";

        else if ($weather->getWindDirectionAttribute() == 270)
            $windDirection = "West";

        else if ($weather->getWindDirectionAttribute() > 270 && $weather->getWindDirectionAttribute() < 360)
            $windDirection = "North/West";


        $array = [
            "temperature" => $weather->getTemperatureAttribute(),
            "rain" => $weather->getRainAttribute(),
            "wind" => $weather->getWindAttribute(),
            "humidity" => $weather->getHumidityAttribute(),
            "windDirection" => $windDirection,
            "latitude" => $user->getLatitudeAttribute(),
            "longitude" => $user->getLongitudeAttribute(),

        ];


        return Response::create($array,200);
    }
    public function getPlantApi()
    {
        $Plant = Plant::all();
        return Response::create($Plant->all(),200);
}
    public function getPlanted($id)
    {
            $user = User::whereId($id)->first();
        return Response::create($user->PlantesPlanted()->get(),200);
    }
    public function setSync($id)
    {
        DB::table('planted')->where('id', $id)->update(['sync' => true]);

    }
    public function getgraines($id)
    {
        $user = User::whereId($id)->first();


        return Response::create($user->graines()->get());

    }
    public function AddSeed(Request $request)
    {
        $user = User::whereId($request->get("user_id"))->first();
        $a = $user->graines()->wherePivot('position', $request->get("position"))->first();
        $anciengraine = json_decode($a, true)["id"];

        if ($anciengraine == null)
            $user->graines()->attach($request->get("plant_id"), ['position' => $request->get("position")]);
        else
            $user->graines()->wherePivot('position', $request->get("position"))->updateExistingPivot($anciengraine, ['plant_id' => $request->get("plant_id")]);
    }
    public function DeleteSeed(Request $request)
    {
        $user = User::whereId($request->get("user_id"))->first();

        $a = $user->graines()->wherePivot('position', $request->get("position"))->first();

        $anciengraine = json_decode($a, true)["id"];

      $user->graines()->wherePivot('position', $request->get("position"))->detach($anciengraine);
    }
    public function AddPlanted(Request $request)
    {
        $user = User::whereId($request->get("user_id"))->first();

       // $a = $user->PlantesPlanted()->wherePivot('X', $request->get("X"))->wherePivot('Y', $request->get("Y"))->first();

      //  $anciengraine = json_decode($a, true)["id"];

      //  if ($anciengraine == null)
            $user->PlantesPlanted()->attach($request->get("plant_id"), ['X' => $request->get("X"),'Y' => $request->get("Y"),'sync' => false]);
       // else
      //      $user->PlantesPlanted()->wherePivot('X', $request->get("X"))->wherePivot('Y', $request->get("Y"))->updateExistingPivot($anciengraine, ['plant_id' => $request->get("plant_id")]);


    }
    public function DeletePlanted(Request $request)
    {
        $user = User::whereId($request->get("user_id"))->first();

        $a = $user->PlantesPlanted()->wherePivot('X', $request->get("X"))->wherePivot('Y', $request->get("Y"))->first();

        $anciengraine = json_decode($a, true)["id"];

        $user->PlantesPlanted()->wherePivot('X', $request->get("X"))->wherePivot('Y', $request->get("Y"))->detach($anciengraine);


    }
    public function AddNewPlant(Request $request)
    {
        return  json_decode($request, true)["suggest"];
    }
    public function getPlantedWithSeed ($plant_id)
{
    $pos = DB::table('graines')->where('plant_id',$plant_id)->get(['position']);


    return \GuzzleHttp\json_decode($pos,true)[0]['position'];
}
    public function getPlantedNotSync($user_id)
{
    $user = User::whereId($user_id)->first();

    $a = $user->PlantesPlanted()->where('sync','0')->orderBy('Y')->get();


    return \GuzzleHttp\json_decode($a,true);
}
    public function InProgressPlante($user_id)
    {
        $x = [];
        $user = User::whereId($user_id)->first();
        $a = $user->PlantesPlanted()->where('sync','1')->orWhere('sync','0')->get();
        for ($i = 0; $i < count($a); $i++)
        {
            $x[$i]= $a[$i];
            $age=DB::table('plant')->where('id',$a[$i]['pivot']['plant_id'])->get(['Age']);
            $daysfromplanted =date_diff($a[$i]['pivot']['created_at'],new \DateTime())->d;
            $x[$i]['daysPassed'] = $daysfromplanted;
            $x[$i]['Age'] = doubleval(\GuzzleHttp\json_decode($age,true)[0]['Age']);
            $x[$i]['pourcentage'] =($x[$i]['daysPassed']/ $x[$i]['Age'])*100;
        }
        return json_encode($x,true);
    }
    public function CurrentPlantedOrUpdated($user_id)
    {
        $x = [];
        $user = User::whereId($user_id)->first();
        $planted = $user->PlantesPlanted()->get();
        for ($i = 0; $i < count($planted); $i++)
        {
            $TimebetweenCreatedAndUpdated =date_diff($planted[$i]['pivot']['updated_at'],new \DateTime())->i;

            if ($TimebetweenCreatedAndUpdated < 1 && $planted[$i]['pivot']['sync']== "2")
            {  $x[$i]['Notfication'] = "FINISHED";
                $x[$i]= $planted[$i]['pivot'];}
        }
        return json_encode($x,true);

    }
    public function FinishedPlante($user_id)
    {
        $x = [];

        $user = User::whereId($user_id)->first();
        $a = $user->PlantesPlanted()->where('sync','2')->get();
        for ($i = 0; $i < count($a); $i++)
        {
            $x[$i]= $a[$i];
            $age=DB::table('plant')->where('id',$a[$i]['pivot']['plant_id'])->get(['Age']);
            $x[$i]['daysPassed'] = doubleval(\GuzzleHttp\json_decode($age,true)[0]['Age']);
            $x[$i]['Age'] = doubleval(\GuzzleHttp\json_decode($age,true)[0]['Age']);
            $x[$i]['pourcentage'] ="100";

        }
        return json_encode($x,true);
    }
    public function GetControllesFor($user_id)
    {
        $Controlles=DB::table('controlles')->where('user_id',$user_id)->get();
        return json_encode($Controlles,true);
    }
    public function InitiateControlles($user_id)
    {
    DB::table('controlles')->where('user_id',$user_id)->update(['up'=>false,'down'=>false,'right'=>false,'left'=>false]);
    }
    public function SetControlles(Request $request)
    {
        if ($request->get("type")=="up")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['up'=>true]);
            else if ($request->get("type")=="down")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['down'=>true]);
            else if ($request->get("type")=="right")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['right'=>true]);
            else if ($request->get("type")=="left")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['left'=>true]);
            else if ($request->get("type")=="camera")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['camera'=>true]);
            else if ($request->get("type")=="zoom_in")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['zoom_in'=>true]);
            else if ($request->get("type")=="zoom_out")
                DB::table('controlles')->where('user_id',$request->get("user_id"))->update(['zoom_out'=>true]);

    }
    public function authenticate(Request $request)
        {
            $credentials = $request->only('email', 'password');

            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    //    return $this->response->error(['error' => 'credentials not correct'],401);
                    return response(json_encode(['error' => 'credentials not correct']));

                }
            } catch (JWTException $exception) {
                return $this->response->error(['error' => 'Somthing want wrong '], 500);

            }
            return response(json_encode(array(compact('token'))));
        }
    public function SendEmail(Request $request)
        {
            $user = array(
                'email' => Auth::user()->email,
                'name' => Auth::user()->name,
                'text' => $request->get("text"),
            );



         Mail::to('elyes.mejri@esprit.tn')->send(new OrderShipped2($user));

        }
    public function UpdateWeather(Request $request)
        {

            DB::table('weathers')->where('user_id', (float)$request->get("user_id"))->update(['Temperature' => (float)$request->get("temp"),'Wind' => (float)$request->get("windspeed"),'WindDirection' =>(float)$request->get("winddirection"),'Rain' =>(float)$request->get("rain"),'Humidity' =>(float)$request->get("humidity")]);

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
