<?php

namespace App\Http\Controllers;

use App\Models\parentattend;
use Illuminate\Http\Request;
use App\Models\Child;

class ParentattendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $childs = Child::all();
        return view('parentattend.create', compact('childs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'child_id' => 'required',
            'date' => 'required',
            'present' => 'required',
            'arrival_time' => 'required',
            'notes' => 'required',
        ]);

        parentattend::create([
            'child_id' => $request->input('child_id'),
            'date' => $request->input('date'),
            'present' =>$request->input('present'),
            'arrival_time' =>$request->input('departure_time'),
            'notes' =>$request->input('notes'),
        ]);
        return redirect()->back()->with('message', '登園情報が送信されました。');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\parentattend  $parentattend
     * @return \Illuminate\Http\Response
     */
    public function show(parentattend $parentattend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\parentattend  $parentattend
     * @return \Illuminate\Http\Response
     */
    public function edit(parentattend $parentattend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\parentattend  $parentattend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, parentattend $parentattend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\parentattend  $parentattend
     * @return \Illuminate\Http\Response
     */
    public function destroy(parentattend $parentattend)
    {
        //
    }
}
