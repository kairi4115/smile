<?php

namespace App\Http\Controllers;
use App\Models\FoodCildRecord;
use App\Http\Controllers\ChildController;
use App\Models\Child;


use Illuminate\Http\Request;

class FoodChildController extends Controller
{
  
    public function index(Request $request)
    {
      $children = Child::all();

      // 選択された値の設定
      $ShowDay = $request->has('show_day');
      $ShowNight = $request->has('show_night');

      //選択された値のフィルタリング
      $foods = FoodCildRecord::query();

       if($ShowDay && $ShowNight) {

       }elseif($ShowDay) {

        $foods->where('meal_type', '昼');

       }elseif($ShowNight) {

        $foods->where('meal_type', '夜');

       }else{

       }

      // 選択されたフィルタリングを記録に設定
      $records = $foods->get();

      // 昼と夜のメッセージをビューに渡す
      return view('food.index', compact('records', 'children',));

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
