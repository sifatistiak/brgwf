<?php

namespace App\Http\Controllers;

use App\Models\Models\Factory;
use App\Models\Models\FactoryCategory;
use App\Models\Models\Union;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factories = Factory::all();
        return view('factory.view',compact('factories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unions = Union::all();
        $factory_category = FactoryCategory::all();
        return view('factory.add',compact('unions', 'factory_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Factory::create($request->all());
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
        $factory = Factory::findOrFail($id);
        $unions = Union::all();
        $factory_category = FactoryCategory::all();
        return view('factory.edit', compact('factory', 'unions', 'factory_category'));
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
        $factory = Factory::findOrFail($id);
        $factory->update($request->all());

        $factory->is_accord = ($request->has('is_accord')) ? 1 : 0;
        $factory->is_alliance = ($request->has('is_alliance')) ? 1 : 0;
        $factory->is_non_compliance = ($request->has('is_non_compliance')) ? 1 : 0;
        $factory->is_nap = ($request->has('is_nap')) ? 1 : 0;
        $factory->is_active = ($request->has('is_active')) ? 1 : 0;

        $factory->update();

        session()->flash('status', "Edited Successfully");
        return redirect()->route('factory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
