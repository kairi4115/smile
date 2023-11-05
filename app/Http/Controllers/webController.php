<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BowelMovement;
use App\Models\Child;
use App\Models\FoodcildRecord;
use App\Models\User;


class webController extends Controller
{
    //

    public function index()
    {
        $childs = Child::all();
        $foods= FoodcildRecord::all();
        $bowels = BowelMovement::all();

        return view('web.index', compact('childs', 'foods', 'bowels'));
    }
}
