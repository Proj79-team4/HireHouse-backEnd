<?php

namespace App\Http\Controllers\Admin;

use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditApartmentRequest;
use App\Http\Requests\StoreApartmentRequest;
use App\Models\Rule;
use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rules = Rule::all();
        $services = Service::all();

        return view("admin.apartments.create", compact('rules', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreApartmentRequest $request)
    {

        $data = $request->validated();
        $data = $request->all();

        if (key_exists("cover_img", $data)) {
            $path = Storage::put("apartment_images", $data["cover_img"]);
        }

        $newApartment = Apartment::create([
            ...$data,
            'user_id' => Auth::user()->id,
            'cover_img' => $path ?? "apartment_images/house_default.png"
        ]);

        if ($request->has('rules')) {
            $newApartment->rules()->attach($data['rules']);
        }

        if ($request->has('services')) {
            $newApartment->services()->attach($data['services']);
        }


        return redirect()->route("admin.apartments.show", $newApartment->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Apartment $apartment)
    {
        return view("admin.apartments.show", compact("apartment"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apartment $apartment)

    {
        $apartment->load("rules", "services");
        $rules = Rule::all();
        $services = Service::all();

        return view("admin.apartments.edit", compact("apartment","rules", "services"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EditApartmentRequest $request, Apartment $apartment)
    {
        
        $data = $request->validated();
        $data = $request->all();
        if(key_exists("rules",$data)){
            $apartment->rules()->sync($data['rules']);

        }
        else{
            $apartment->rules()->sync([]);
        }
        if(key_exists("services",$data)){
           
            $apartment->services()->sync($data['services']);
        }
        else{
            $apartment->services()->sync([]);
        }
        if (key_exists("cover_img", $data)) {
            $path = Storage::put("apartment_images", $data["cover_img"]);
            if(!$apartment->cover_img==="apartment_images/house_default.png"){
                Storage::delete($apartment->cover_img);
            }
            
        }

        $apartment->fill($data);
        if (key_exists("cover_img", $data)) {
            $apartment->cover_img = $path;
            
        }
        $apartment->save();
        return redirect()->route("admin.apartments.show", $apartment->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apartment $apartment)
    {
        if(!$apartment->cover_img==="apartment_images/house_default.png"){
            Storage::delete($apartment->cover_img);
        }
        $apartment->delete();
        return redirect()->route("admin.dashboard");
    }
}
