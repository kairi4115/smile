<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BowelMovement;

class BowelMovementController extends Controller
{
    public function index()
    {   
        $bowels = BowelMovement::all();
        return view('bowel.index', compact('bowels'));
    }

    public function create()
    {
        return view('bowel.create');
    }
  
    public function store(Request $request)
    {
      // バリデートを設定する
      $rules =[
        'name' => 'required|string',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
       
      ];

      //バリデーションを実行
      $this->validate($request,$rules);

      //フォームから送信されたデータを受け取る
      $name = $request->input('name');
      $date = $request->input('date');
      $time = $request->input('time');
      $notes = $request->input('notes');

    // チェックボックスの値を配列として取得
     $type=$request->input('type', []);

     // 便の形態を取得（チェックボックスで選択された場合）
     $stoolType = $request->input('stool_type', null);
    

     //データベースに保存
     $bowel = new BowelMovement();
     $bowel->name = $name;
     $bowel->date = $date;
     $bowel->time = $time;
     $bowel->notes = $notes;

     // タイプ情報をカンマ区切りの文字列に変換
     $typeString = implode(',' , array_slice($type, 0, 255));
     $bowel->type = $typeString;

    
     $bowel->stool_type = substr($stoolType, 0, 255);

     $bowel->save();

     // 成功メッセージをセットしてリダイレクト
      return redirect()->route('bowel.create')->with('message', '排泄データが保存されました。');

    }

    public function edit($id)
    {
      $Bowel = BowelMovement::find($id);
      return view('bowel.edit', compact('Bowel'));
    }

    public function update(Request $request, $id)
    {
      request()->validate([
        'name' => 'required|string',
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
        'notes' => 'required',
      ]);

      $Bowel = BowelMovement::find($id);

      // チェックボックスの値を配列として受け取る
      $type = $request->input('type', []);

      // 便の形態を取得（チェックボックスで選択された）
      $stoolType = $request->input('stool_type', null);

      $Bowel->update([
        'name' => $request->input('name'),
        'date' => $request->input('date'),
        'time' => $request->input('time'),
        'notes' => $request->input('notes'),
        //タイプ情報をカンマ区切りの文字列に変更する
        $typeString = implode(',',$type),
        $Bowel->type = $typeString,
        $Bowel->stool_type = $stoolType,

      ]);

      return redirect()->back()->with('message', '排泄記録が更新されました');
    }

    public function destroy($id)
    {
      $bowel = BowelMovement::find($id);
      
      if ($bowel) {
        $bowel->delete();
        return redirect()->route('bowel.index')->with('message', '排泄情報が削除されました');
      } else {
        return redirect()->route('bowel.index')->with('message', '排泄情報削除に失敗しました');
      }
    }
}
