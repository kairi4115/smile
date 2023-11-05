<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceReport extends Model
{
    use HasFactory;

    protected $table = 'absence_reports';

    protected $fillable = ['child_id', 'date', 'reason', 'note'];

    public function child()
    {
        return $this->belongsTo(child::class, 'child_id');
    }

}
