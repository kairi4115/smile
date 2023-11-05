<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parentchild extends Model
{
    use HasFactory;
   
    protected $table = 'parent_child';
    protected $fillable = ['name', 'parentname'];
}
