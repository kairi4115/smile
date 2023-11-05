<?php

namespace App\Http\Controllers;
use App\Models\Child;

use Illuminate\Http\Request;

class ChildController extends Controller
{
    //

    public function index()
    {
        $childs = Child::latest()->paginate(5);
        return view('Child.index', ['childs' => $childs]);
    }

    public function create()
    {
       return view('Child.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(
           ['name' => 'required|string|max:255',
            'birthdate' => 'required|date',
            'address' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:20',
             'image' =>'required|mimes:jpeg,png,jpg,gif,svg',
             'parentname' => 'required|string|max:255'],
            
           ['name.required' => '名前を入力してください',
            'birthdate.required' => '生年月日を入力してください',
            'address.required' => '住所を入力してください',
            'phone_number.required' => '電話番号を入力してください',
            'image' => '画像を選択してください',
            'parentname' => '保護者名を記入してください'],
      
        );

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$name);

       child::create([
        'name' => request('name'),
        'birthdate' =>request('birthdate'),
        'address' =>request('address'),
        'phone_number' =>request('phone_number'),
        'image' =>$name,
        'parentname' =>request('parentname'),
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
        foreach($rowsToUpdate as $row) {
            $row->update(['id' => $newId]);
            $newId++;
        }

        return redirect()->route('child.index')->with('message', '児童情報が削除されました');
    }
}


