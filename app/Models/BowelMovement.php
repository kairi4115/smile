<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BowelMovement extends Model
{
    use HasFactory;

    protected $fillable = ['name','date', 'time', 'type', 'stool_type','notes'];

   
    
}
