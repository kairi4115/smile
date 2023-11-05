<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceRecord;
use App\Models\Child;
use Symfony\Contracts\Service\Attribute\Required;

class AttendanceRecordController extends Controller
{
    //
    public function index()
    {
        $Attends = AttendanceRecord::all();
        return view('attend.index', compact('Attends'));
    }

    public function create()
    {
        $childs = Child::all();
        return view('attend.create', compact('childs'));
    }

    public function store(Request $request)
    {
      request()->validate([
        'child_id' =>'required',
        'date' => 'required',
        'present' => 'required',
        'arrival_time' => 'required',
        'departure_time' => 'required',
        'notes'=> 'required',
      ]);

      AttendanceRecord::create([
        'child_id'=>$request->input('child_id'),
        'date'=>$request->input('date'),
        'present'=>$request->input('present'),
        'arrival_time' =>$request->input('arrival_time'),
        'departure_time' =>$request->input('departure_time'),
        'notes' =>$request->input('notes'),
      ]);

      return redirect()->back()->with('message', '出勤記録が登録されました');
    }

    public function edit($id)
    {
        $childs = Child::all();
        $Attend = AttendanceRecord::find($id);
        return view('attend.edit', compact('childs', 'Attend'));
    }

    public function update(Request $request, $id)
    {
       request()->validate([
        'child_id' => 'required',
        'date' => 'required',
        'present' => 'required',
        'arrival_time' => 'required',
        'departure_time' => 'required',
        'notes'   => 'required',
       ]);

       $Attend = AttendanceRecord::find($id);

       $Attend->update([
        'child_id' => $request->input('child_id'),
        'date'     => $request->input('date'),
        'present'  => $request->input('present'),
        'arrival_time' => $request->input('arrival_time'),
        'departure_time' =>$request->input('departure_time'),
        'notes'    => $request->input('notes'),
       ]);

       return redirect()->back()->with('message', '出席記録が編集されました');
    
    }

    public function destroy($id)
    {
      
      $Attend = AttendanceRecord::find($id);

      if($Attend)
      {
        $Attend->delete();
        return redirect()->route('attend.index')->with('message', '出勤記録が削除されました');

      } else {
        return redirect()->route('attend.index')->with('message', '出勤記録の削除に失敗しました');
      }
    }
}
