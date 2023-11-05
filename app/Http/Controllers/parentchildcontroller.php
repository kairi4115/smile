<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parentchild;
use App\Models\Child;
use App\Models\AttendanceRecord;
use App\Models\BowelMovement;
use App\Models\FoodcildRecord;
use App\Models\TransportRecord;
use App\Models\User;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Support\Facades\Redirect;
use Symfony\Contracts\Service\Attribute\Required;

class parentchildcontroller extends Controller
{
    //
    public function create(){
     return view('parents.create');
    }

    public function index(Request $request)
    {
        $parentChildName = $request->input('name');
        $parent = $request->input('parentname');
       
           
        $child = Child::where('name', $parentChildName)
                       ->where('parentname', $parent)
                       ->first(); // 最初の一致するレコードを取得
       
        if ($child) {
            // parentChildName と childのname または parent と childのparentname が一致する場合
            $childData = $child->only(['name', 'image', 'birthdate', 'address', 'phone_number',]);
            return view('parents.index', compact('childData'));
        } else {
            return redirect()->route('parents.create')->with('message', '一致する情報が見つかりません');
        }
    }
  }    