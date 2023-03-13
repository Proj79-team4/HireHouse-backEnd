<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApartmentController extends Controller
{

    //funzione che permette di visualizzare gli ultimi appartamenti con sponsorizzazioni ancora attive
    public function sponsorApartment()
    {

        $apartmentslist = Apartment::with('sponsors')->get();
        $apartmentFilteredList = [];

        foreach ($apartmentslist as $apartment) {
            if (($apartment->toArray()["sponsors"] !== [])) {
                $apartmentFilteredList[] = $apartment;
            }
        }

        return response()->json($apartmentFilteredList);
    }

    public function researchApartment(Request $request)
    {
        $data = $request->all();
        //lat e long del punto rihiesto dall'utente
        $lat = $data["lat"];
        $lng = $data["lng"];
        //distanza esperessa in km
        $distance=$data["dist"];

        
        // query scritta in mysql per trovare gli appartamenti dato un punto esperesso in lat e lon e una distanza e ordinati in ordine asc per distanza
        // $query = "SELECT *, ( 3959 * acos ( cos ( radians(" . $lat . ") ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians(" .  $lng . ") ) + sin ( radians(" . $lat . ") ) * sin( radians( Latitude ) ) ) )*(1.6093)
        //  AS `distance`  
        //  FROM `apartments` 
        //  WHERE ( 3959 * acos ( cos ( radians(" . $lat . ") ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians(" .  $lng . ") ) + sin ( radians(" . $lat . ") ) * sin( radians( Latitude ) ) ) )*(1.6093) <= $distance 
        //  ORDER BY distance ASC  ";

        // $locations = DB::select($query);
        
       



        $apartments = Apartment::query();
        $apartments->select("*",DB::raw(" ( 3959 * acos ( cos ( radians(" . $lat . ") ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians(" .  $lng . ") ) + sin ( radians(" . $lat . ") ) * sin( radians( Latitude ) ) ) )*(1.6093)
        AS `distance`"))
        ->whereRaw("( 3959 * acos ( cos ( radians(" . $lat . ") ) * cos( radians( Latitude ) ) * cos( radians( Longitude ) - radians(" .  $lng . ") ) + sin ( radians(" . $lat . ") ) * sin( radians( Latitude ) ) ) )*(1.6093) <= $distance")
        ->orderByRaw("distance ASC");


        
        
       
        if (!is_null($request->title)) {
            $apartments->where("title", "LIKE", "%{$request->title}%");
        }
        if (!is_null($request->num_beds)) {
            $apartments->where("num_beds", ">=", "{$request->num_beds}");
        }
        if (!is_null($request->num_rooms)) {
            $apartments->where("num_rooms", ">=", "{$request->num_rooms}");
        }
        if (!is_null($request->num_bathrooms)) {
            $apartments->where("num_bathrooms", ">=", "{$request->num_bathrooms}");
        }
        if (!is_null($request->square_meters)) {
            $apartments->where("square_meters", ">=", "{$request->square_meters}");
        }
        if (!is_null($request->square_meters)) {
            $apartments->where("square_meters", ">=", "{$request->square_meters}");
        }
        $apartments = $apartments->get();
        return response()->json($apartments);
    }
}
