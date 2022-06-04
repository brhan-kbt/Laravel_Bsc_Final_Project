<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    
   
    public function museum_records()
    {
        return $this->hasMany(MuseumRecord::class);
    }
    
     public function events()
    {
        return $this->hasMany(Event::class);
    }

     public function user()
    {
        return $this->hasOne(UserAccount::class);
    }

    public function tithes()
    {
        return $this->hasMany(Tithe::class);
    }

      public function offerings()
    {
        return $this->hasMany(Offering::class);
    }

      public function promises()
    {
        return $this->hasMany(Promise::class);
    }
}