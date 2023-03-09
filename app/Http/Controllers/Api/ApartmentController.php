<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class ApartmentController extends Controller
{

    //funzione che permette di visualizzare gli ultimi appartamenti con sponsorizzazioni ancora attive
    public function sponsorApartment(){
        
        $apartmentslist = Apartment::with('sponsors')->get();
        $apartmentFilteredList=[];
       
        foreach($apartmentslist as $apartment){
            if(($apartment->toArray()["sponsors"]!==[])){
                $apartmentFilteredList[]=$apartment;
            }
        }
        
        return response()->json($apartmentFilteredList);

    }

    public function researchApartment(Request $request){
        $data=$request->all();
        $apartments = Apartment::query();
        if(!is_null($request->title)){
            $apartments->orWhere("title", "LIKE", "%{$request->title}%");
        }
        if(!is_null($request->num_beds)){
            $apartments->orWhere("num_beds", ">=", "{$request->num_beds}");
        }
        $apartments= $apartments->get();
        return response()->json($apartments);

    }
}
