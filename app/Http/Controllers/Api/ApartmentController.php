<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function sponsorApartment(){
        $apartmentslist=Apartment::all();
        $apartmentslist = Apartment::with('apartment_sponsor')->get();

        return response()->json($apartmentslist);

    }
}
