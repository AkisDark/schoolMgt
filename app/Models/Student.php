<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Level;
use App\Models\Wilaya;
use App\Models\_Parent;
use App\Models\Absence;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;


    protected $table = 'students';

    protected $guarded = [];

    public function parent(){
        return $this->belongsTo(_Parent::class, 'parent_id', 'id');
    }

    public function level(){
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function specialization(){
        return $this->belongsTo(Specialization::class, 'specialization_id', 'id');
    }

    public function room(){
        return $this->belongsTo(Room::class);
    }


    public function absences(){
        return $this->hasMany(Absence::class);
    }


    public function wilaya(){
        return $this->belongsTo(Wilaya::class);
    }
}
