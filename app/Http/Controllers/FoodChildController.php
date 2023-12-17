<?php

namespace App\Http\Controllers;
use App\Models\FoodCildRecord;
use App\Http\Controllers\ChildController;
use App\Models\Child;

use Illuminate\Http\Request;

class FoodChildController extends Controller
{
  
    public function index()
    {
      $children= Child::all();
       $records = FoodCildRecord::all();
      
       // メッセージを格納するための空の配列を初期化
       $messages = [];

       // 食事量の計算を行い、増減の判断を行う
      foreach($records as $record) { 

      //2/4以下であれば夜の食事量を増やす
      if($record->meal_amount <=  2/4) {
        $message ='おやつ多め';
      }else{ 
      //2/4以上
       $message = 'おやつ少なめ';
    }
     // メッセージを配列に追加
     $messages[$record->id]= $message;
      

  }
        return view('food.index',compact('records', 'children', 'messages', 'message'));
    }

   public function create()
   {
    $children = Child::all();
   
    return view('food.create', compact('children'));

   }

   public function store(Request $request)
   {


    
        request()->validate(
        ['child_id' => 'required',
         'record_date' => 'required',
         'meal_type' => 'required|in:昼,夜',
        'meal_description' => 'required',
         'meal_amount' =>     'required'],

        ['child_id.required' => '児童名を選択してください',
         'record_date.required' => '日付けを入力してください',
         'meal_type.required' => '食事の種類を選択してください',
         'meal_type.in' => '食事カテゴリーは「昼」または「夜」を選択してください',
         'meal_description.required' => '食事の詳細を入力してください',
         'meal_amount.required' => '食事の量を記入してください'],
    );

    // フォームから送信された値を取得
    $mealAmountInput = $request->input('meal_amount');

    // 分数値を数値に変換
    list($numerator, $denominator) = explode('/', $mealAmountInput);
    $mealAmount = $numerator / $denominator;
    
    FoodCildRecord::create([
        'child_id' => $request->input('child_id'),
        'record_date'=> $request->input('record_date'),
        'meal_type' => $request->input('meal_type'),
        'meal_description' => $request->input('meal_description'),
        'meal_amount' => $mealAmount,
    ]);

    return redirect()->back()->with('message', '児童情報が登録されました');
   }


   public function edit($id)
   {
    $record = FoodCildRecord::find($id);
    $children = Child::all();
    return view('food.edit', compact('record', 'children'));

   }

   public function update(Request $request, $id)
   {
    
       request()->validate([
         
        'child_id' => 'required',
         'record_date' => 'required',
         'meal_type' => 'required|in:昼,夜',
        'meal_description' => 'required',
        'meal_amount' => 'required',

        'child_id.required' => '児童名を選択してください',
         'record_date.required' => '日付けを入力してください',
         'meal_type.required' => '食事の種類を選択してください',
         'meal_type.in' => '食事カテゴリーは「昼」または「夜」を選択してください',
         'meal_description.required' => '食事の詳細を入力してください',
         'meal_amount.required' => '食事の量を入力してください',
    ]);

      $record = FoodCildRecord::find($id);

      $record->update([
        'child_id' => $request->input('child_id'),
        'record_date' => $request->input('record_date'),
        'meal_type' => $request->input('meal_type'),
        'meal_description' => $request->input('meal_description'),
        'meal_amount' => $request->input('meal_amount'),
      ]);

      return redirect()->back()->with('message', '更新をおこないました');
   
   }

    
   public function  destroy($id)
   {
    
     $record = FoodCildRecord::find($id);

     if($record) {
        $record->delete();
        return redirect()->route('food.index')->with('message', '児童情報が削除されました');
     }

     return redirect()->route('food.index')->with('error', '削除に失敗しました');
   }

}
