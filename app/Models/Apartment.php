<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable=["title","cover_img","user_id","num_rooms","num_beds","num_bathrooms","square_meters","full_address","visibile","price","description","check_in","check_out","latitude","longitude"];

    // un appartamento sarà posseduto da un solo utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // un appartamento avrà molti messaggi 
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    // un appartemanto possiede più views
    public function views()
    {
        return $this->hasMany(View::class);
    }


    // un appartamento può avere più services
    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    // un appartamento può avere più sponsors
    public function sponsors()
    {
        return $this->belongsToMany(Sponsor::class);
    }

     // un appartamento può avere più Rules
     public function rules()
     {
         return $this->belongsToMany(Rule::class);
     }

}
