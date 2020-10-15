<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
class UtilityController extends Controller
{
    
    public function allcity(Request $request , $value)
       {
            $city = City::where('name',$value)
            ->with('state')
            ->with('country')
            ->get();
            return response()->json($city);
        }

    public function allstates(Request $request , $value)
       {
            $state = State::where('name',$value)
            ->with('city')
            ->get();
            return response()->json($state);
        }
    public function allstatebycountry(Request $request , $country)
        {
             $state = Country::where('name',$country)
             ->with('state')
             ->get();
             return response()->json($state);
         }

    public function countries(Request $request ,$key ,$value) 
        {
            $country = Country::where($key,$value)
            ->with('state')
            ->get()->toArray()[0];
            //dd($country);
            foreach($country["state"] as $key => $val)
            {
                $city = City::where('state_id',$val["id"])->get()->toArray();
                $country["state"][$key]["city"] = $city;
            }
            //dd($country);
            return response()->json($country);
        }
    public function allcountries()
        {
            $countries = Country::all();
            return response()->json($countries);
        }
    
}
