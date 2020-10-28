<?php

namespace App\Http\Controllers;

use App\Models\Models\FactoryCategory;
use Illuminate\Http\Request;

class FactoryCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory_cats = FactoryCategory::all();
        return view('factory-category.view',compact('factory_cats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('factory-category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FactoryCategory::create($request->all());

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
        $factory_category = FactoryCategory::findOrFail($id);
        return view('factory-category.edit',compact('factory_category'));
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
        $factory_category = FactoryCategory::findOrFail($id);
        $factory_category->update($request->all());

        $factory_category->status = ($request->has('status')) ? 1 : 0;
        $factory_category->update();
        session()->flash('status', "Edited Successfully");

        return Redirect()->route('factory-category.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factory_category = FactoryCategory::findOrFail($id);
        $factory_category->delete();
        session()->flash('status', "Deleted Successfully");

        return Redirect()->route('factory-category.index');
    }
}
