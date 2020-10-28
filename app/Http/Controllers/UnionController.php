<?php

namespace App\Http\Controllers;

use App\Models\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unions = Union::all();
        return view('union.view',compact('unions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('union.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Union::create($request->all());
        session()->flash('status', "Created Successfully");

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $union = Union::findOrFail($id);
        return view('union.edit', compact('union'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $union = Union::findOrFail($id);
        $union->update($request->all());

        $union->is_active = ($request->has('is_active')) ? 1 : 0;
        $union->is_cba = ($request->has('is_cba')) ? 1 : 0;
        $union->is_osh = ($request->has('is_osh')) ? 1 : 0;

        $union->update();

        session()->flash('status', "Edited Successfully");
        return redirect()->route('union.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $union = Union::findOrFail($id);
        $union->delete();

        session()->flash('status', "DELETED Successfully");
        return redirect()->route('union.index');
    }
}
