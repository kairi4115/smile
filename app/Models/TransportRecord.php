<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportRecord extends Model
{
    use HasFactory;

    protected $fillable = ['child_name', 'transport_date', 'departure_location', 'destination', 'passenger_name'];

}
