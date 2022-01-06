<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Wilaya;
use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = []; 

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function material(){
        return $this->belongsTo(Material::class);
    }

    public function wilaya(){
        return $this->belongsTo(Wilaya::class);
    }
}
