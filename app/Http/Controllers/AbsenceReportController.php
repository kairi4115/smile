<?php

namespace App\Http\Controllers;
use App\Models\Child;
use App\Models\AbsenceReport;
use Illuminate\Http\Request;

class AbsenceReportController extends Controller
{
    //
    public function index()
    {
     $AbsenceReports = AbsenceReport::all();
     return view('absence.index', compact('AbsenceReports'));

    }

    public function create()
    {
        $childs = Child::all();
        return view('absence.create', compact('childs'));
    }

    public function store(Request $request)
    {
        request()->validate([
            'child_id' => 'required|string|max:255',
            'date'  => 'required|date',
            'reason' => 'required|string|max:255',
            'note'  => 'required|string|max:255',
        ],
    
        ['child_id.required' => '名前を入力してください',
         'date.required'   => '日付けを入力してください',
         'reason.required' => '欠席理由を入力してください',
         'note.required'           => '保護者連絡事項を記入してください'],
 );

        AbsenceReport::create([
           'child_id' =>$request->input('child_id'),
           'date'  =>$request->input('date'),
           'reason' =>$request->input('reason'),
           'note'  =>$request->input('note'),

        ]);

        return redirect()->back()->with('message', '欠席記録が作成されました');
    }


     public function edit($id)
     {
         $childs = Child::all();
         $AbsenceReports = AbsenceReport::find($id);

         return view('absence.edit', compact('AbsenceReports', 'childs'));
     }

      public function update(Request $request, $id)
      { 


      request()->validate([
        'child_id' => 'required',
        'date'  => 'required',
        'reason' => 'required',
        'note' =>   'required',     
      ],
    
      [ 'child_id.required' => '名前を入力してください',
        'date.required'     => '日付を入力してください',
        'reason.required'   => '欠席理由を入力してください',
        'note.required'     => '保育者連絡事項を入力してください'],
    );

     $AbsenceReport = AbsenceReport::find($id);


     $AbsenceReport->update([
        'child_id' => $request->input('child_id'),
        'date'     => $request->input('date'),
        'reason'   => $request->input('reason'),
        'note'     => $request->input('note'),
     ]);

     return redirect()->back()->with('message', '欠席記録が更新されました');

      }


     public function destroy($id)
     {
        $AbsenceReport = Absencereport::find($id);

        if($AbsenceReport){
            $AbsenceReport->destroy($id);
            return redirect()->route('absence.index')->with('message', '欠席記録が削除されました');

            }else {
            return redirect()->route('absence.index')->with('message','欠席記録の削除に失敗しました');
        }
     }

}






   