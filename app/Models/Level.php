<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Level extends Model
{
    use HasFactory;

    protected $table = 'levels';

    protected $guarded = [];


    public function students(){
        return $this->hasMany(Student::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
