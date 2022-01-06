<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class _Parent extends Model
{
    use HasFactory;

    protected $table = "parents";

    protected $guarded = [];

    public function students(){
        return $this->hasMany(Student::class, 'parent_id', 'id');
    }
}
