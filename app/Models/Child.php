<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $table = 'children';
    protected $fillable = ['name', 'image', 'birthdate', 'address', 'phone_number', 'parentname'];


    public function foodchild_records()
    {
        return $this->hasMany(FoodCildRecord::class, 'child_id', 'id');
    }

    public function bowel_movements()
    {
        return $this->hasMany(BowelMovement::class, 'id');
    }

    public function attendance_records()
    {
        return $this->hasMany(AttendanceRecord::class, 'id');
    }

    public function TransportRecord()
    {
        return $this->hasMany(TransportRecord::class, 'child_id', 'id');
    }

}

