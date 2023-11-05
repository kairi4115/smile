<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportRecord;
use App\Models\Child;
use League\CommonMark\Extension\InlinesOnly\ChildRenderer;

class TransportRecordController extends Controller
{
    //

    public function index()
{
    $tranes = TransportRecord::all();
    return view('trans.index', compact('tranes'));
}


    public function create()
    {
        $childs = Child::all();
        return view('trans.create', compact('childs'));
    }
    
    public function store(Request $request )
    {
       request()->validate([
        'child_name' => 'required',
        'transport_date' => 'required',
        'departure_location' => 'required',
        'destination' => 'required',
        'passenger_name' => 'required',
       ]);

       TransportRecord::create([
        'child_name' => $request->input('child_name'),
        'transport_date' => $request->input('transport_date'),
        'departure_location' => $request->input('departure_location'),
        'destination' => $request->input('destination'),
        'passenger_name' => $request->input('passenger_name'),
       ]);

       return redirect()->back()->with('message', '送迎記録が登録されました');
    }

    public function edit($id)
    {   
        $childs = Child::all();
        $trans = TransportRecord::find($id);
        return view('trans.edit', compact('trans', 'childs'));
    }

    public function update(Request $request, $id)
    {    
       
        request()->validate([
            'child_name' => 'required',
            'transport_date' => 'required',
            'departure_location' => 'required',
            'destination' => 'required',
            'passenger_name' => 'required',
            
            'child_name' => '児童名を入力してください',
            'transport_date' => '日付けを入力してください',
            'departure_location' => '出発場所を入力してください',
            'destination' => '到着場所を入力してください',
            'passenger_name' => '乗車員の名前を入力してください',
        ]);

         $trans = TransportRecord::find($id);

        $trans->update([
            'child_name' => $request->input('child_name'),
            'transport_date' => $request->input('transport_date'),
            'departure_location' => $request->input('departure_location'),
            'destination' => $request->input('destination'),
            'passenger_name' => $request->input('passenger_name'),

        ]);

        return redirect()->back()->with('message', '更新をおこないました');



    }

    public function destroy($id)
    {

        $trans = TransportRecord::find($id);

        if($trans) {
            $trans->delete();
            return redirect()->route('trans.index')->with('message', '送迎記録が削除されました');
        }

        return redirect()->route('trans.index')->with('error', '削除に失敗しました');

    }

}