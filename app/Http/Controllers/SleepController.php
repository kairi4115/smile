<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\sleep;

use Illuminate\Database\Eloquent\Model;



use Illuminate\Http\Request;

class SleepController extends Controller
{
    //
    public function create(){

       $children = Child::all();
        return view('sleep.create', compact('children'));
}


  public function store () {
    // バリデーション
    request()->validate(
        [
            'child_id' => 'required',
            'nap_start' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'notes'     =>  'required',
        ],

        [
            'child_id.required' => '児童名を選択してください',
            'nap_start.required' => '日付を入力してください',
            'start_time.required'  => '午睡開始時間を入力してください',
            'end_time.required' => '起床時間を入力してください', 
            'notes.required'    => 'テキスト項目に文字を記入してください',
        ],
    );

    sleep::create([
        'child_id' => request('child_id'),
        'nap_start' => request('nap_start'),
        'start_time' => request('start_time'),
        'end_time' => request('end_time'),
        'notes'     => request('notes'),
    ]);

    return redirect()->back()->with('message', '午睡記録が登録されました');
  }

   public function edit($id)
   {
    $sleep = Sleep::find($id);
    return view('sleep.edit', compact('sleep'));
   }

   

    }
   

