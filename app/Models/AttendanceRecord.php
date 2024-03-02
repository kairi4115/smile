<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceRecord extends Model
{
    use HasFactory;

    protected $fillable = ['child_id', 'date', 'present', 'arrival_time', 'departure_time', 'notes'];

    public function child()
    {
        return $this->belongsTo(child::class, 'id');
    }
}
