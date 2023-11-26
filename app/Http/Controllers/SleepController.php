<?php

namespace App\Http\Controllers;
use App\Models\sleep;

use Illuminate\Database\Eloquent\Model;



use Illuminate\Http\Request;

class SleepController extends Controller
{
    //
    public function create(){
        return view('sleep.create');
}


  public function store () {
    // バリデーション
    request()->validate(
        [
            'child_id' => 'required',
            'nap_start' => 'required',
            'nap_end'   => 'required',
            'text'     =>  'required',
        ],

        [
            'child_id.required' => '児童名を選択してください',
            'nap_start.required' => '午睡開始時間を記入してください',
            'nap_end.required' => '午睡終了時間を記入してください',
            'text.required'    => 'テキスト項目に文字を記入してください',
        ],
    );

    sleep::create([
        'child_id' => request('child_id'),
        'nap_start' => request('nap_start'),
        'nap_end'   => request('nap_end'),
        'text'     => request('text'),
    ]);


  }
    }
   

