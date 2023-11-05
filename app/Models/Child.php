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
        return $this->hasMany(FoodchildRecord::class, 'child_id');
    }
}

