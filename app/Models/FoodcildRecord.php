<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodcildRecord extends Model
{
    use HasFactory;

    protected $table = 'foodchild_records'; // テーブル名を指定

    protected $fillable = [
        'child_id', 
        'record_date',
        'meal_type',
        'meal_description',
        'meal_amount',
    ];

    // FoodchildRecordモデルからChildモデルへの逆向きのリレーションシップ
    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}
