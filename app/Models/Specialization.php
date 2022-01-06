<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Specialization extends Model
{
    use HasFactory;

    protected $table = 'specializations';

    protected $guarded = [];

    public function student(){
        return $this->hasOne(Student::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
