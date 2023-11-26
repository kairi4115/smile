<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sleep extends Model
{
    use HasFactory;

    protected $table = 'slepp';
    protected $fillable = ['child_id', 'nap_start', 'nap_end', 'notes'];
}
