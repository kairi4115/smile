<?php

namespace App\Http\Controllers;
use App\Models\Child;

use Illuminate\Http\Request;
class parenttopcontroller extends Controller
{
    //
    public function index(){
        $childs = Child::all();
        return view('parents.top', compact('childs'));
    }
}
