<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\BowelMovement;
use App\Models\Child;
use App\Models\FoodCildRecord;
use App\Models\TransportRecord;
use Illuminate\Http\Request;

class ChildController extends Controller
{
    public function index()
    {
        $childs = Child::all();
        return view('child.index', ['childs' => $childs]);
    }

    public function create()
    {
        return view('child.create');
    }

    public function store(Request $request)
    {
        $validationMessages = [
            'name.required' => '名前を入力してください',
            'birthdate.required' => '生年月日を入力してください',
            'address.required' => '住所を入力してください',
            'phone_number.required' => '電話番号を入力してください',
            'image.required' => '画像を選択してください',
            'parentname.required' => '保護者名を記入してください',
        ];

        request()->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date_format:Y-m-d',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'parentname' => 'required|string|max:255',
        ],$validationMessages);
        

        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $name);

        Child::create([
            'name' => $request->input('name'),
            'birthdate' => $request->input('birthdate'),
            'address' => $request->input('address'),
            'phone_number' => $request->input('phone_number'),
            'image' => $name,
            'parentname' => $request->input('parentname'),
        ]);
       
       
        return redirect()->back()->with('message', '児童情報が登録されました');
    }

    public function edit($id)
    {
        $child = Child::find($id);
        return view('child.edit', compact('child'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'parentname' => 'required|string|max:255',
        ], [
            'name.required' => '名前を入力してください',
            'birthdate.required' => '生年月日を入力してください',
            'address.required' => '住所を入力してください',
            'phone_number.required' => '電話番号を入力してください',
            'parentname.required' => '保護者名を記入してください',
        ]);

        $child = Child::find($id);
        $child->update($validatedData);

        return redirect()->back()->with('message', '児童情報が更新されました');
    }

    public function destroy($id)
    {
        $child = Child::find($id);

        if (!$child) {
            return redirect()->route('child.index')->with('error', '指定された児童情報が存在しません');
        }

        $child->delete();

        // 削除した行のIDより大きいIDを持つ行を取得
        $rowsToUpdate = Child::where('id', '>', $id)->get();

        // 取得した行のIDを再連番する
        $newId = $id;
        foreach ($rowsToUpdate as $row) {
            $row->update(['id' => $newId]);
            $newId++;
        }

        return redirect()->route('child.index')->with('message', '児童情報が削除されました');
    }

    public function GetChildID($id,) {

        $message = null;
        $child = Child::find($id);
       
       if($child) {
         
                            
        $FoodChildRecords = $child->foodchild_records;
        $bowelMovements = $child->bowel_Movements;
        $AttendanceRecords = $child->attendance_records;
        $transportRecords = $child->transport_records;

      } else {

        $message = ['児童に値するものがありません'];

      }

      return view('child.id', compact( 'FoodChildRecords', 'bowelMovements', 'AttendanceRecords', 'transportRecords', 'message'));
    }

    public function ChildResearch() {
        return view('child.research');
    }

    public function ChildResults( Request $request) {
        
        
        // フォームから送られてきた値（request)を変数に代入する
        $name = $request->input('name');
        $date = $request->input('date');

        
             $researchName = $name ? Child::where('name', $name)->get() : ['messsage' => '該当するものがありません'];
             $FoodRecords = $date ? FoodCildRecord::where('record_date', $date)->whereNotNull(['child_id', 'meal_type', 'meal_description', 'meal_amount'])->get() : null;
             $BowelMovements =  $date ? BowelMovement::where('date', $date)->whereNotNull(['name', 'time', 'type', 'stool_type', 'notes'])->get() : null;
             $AttendanceRecords = $date ?  AttendanceRecord::where('date', $date)->whereNotNull(['child_id', 'present', 'arrival_time', 'departure_time', 'notes'])->get() : null;
             $transportRecords = $date ? TransportRecord::where('transport_date', $date)->whereNotNull(['child_name', 'departure_location', 'destination', 'passenger_name'])->get() : null;
           
            $message= [
                $foodRecords = $FoodRecords ? $FoodRecords : ['message' => '日付に該当するものがありませんと'],
                $bowelMovements = $BowelMovements ? $BowelMovements : ['message' => '日付に該当するものがありませんと'],
                $attendanceRecords = $AttendanceRecords ? $AttendanceRecords : ['message' => '日付に該当するものがありませんと'],
                $transportRecords = $transportRecords ? $transportRecords :  ['message' => '日付に該当するものがありませんと'],
                
            ];

         return view('child.results', [
            'foodRecords' => $FoodRecords,
            'bowelMovements' => $BowelMovements,
            'attendanceRecords' => $AttendanceRecords,
            'transportRecords' => $transportRecords,
            'researchName'  => $researchName,
            'message' => $message,
           
        ]);
    }
}
        //$date = $request->input('date');
       // $meal_type = $request->input('meal_type');
       // $bowelMovements_type = $request->input('type');
       // $bowelMovements_stool_soft = $request->input('stool_type_soft');
        //$bowelMovements_stool_hard = $request->input('stool_type_hard');
        //$present = $request->input('present');
       // $arrival_time = $request->input('arrival_time');
        //$departure_time = $request->input('departure_time');
        //$departure_location = $request->input('departure_location');
       //$destination = $request->input('destination');
        //$passenger_name = $request->input('passenger_name');

    

    


