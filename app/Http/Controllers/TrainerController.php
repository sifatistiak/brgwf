<?php

namespace App\Http\Controllers;

use App\Models\Models\Department;
use App\Models\Models\Designation;
use App\Models\Models\Trainer;
use App\Models\Models\Training;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers = Trainer::with('department')->with('designation')->with('course')->get();
        return view('trainer.view', compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();
        $designations = Designation::all();
        $courses = Training::all();
        $unique_id = substr(time(), 3) . rand(100, 999);


        return view('trainer.add',compact('departments', 'designations', 'courses', 'unique_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $img_name = uniqid() . ".jpg";

        Trainer::create(array_merge($request->all(),['img_name' => $img_name]));
        if ($request->webimg !== null) {
            // got Webcam Image

            $binary_data = base64_decode($request->webimg);
            $result = file_put_contents('trainer_image/' . $img_name, $binary_data);
        } else {

            if ($request->hasFile('photo')) {
                Image::make($request->file('photo'))->resize(250, 250)->save('trainer_image/' . $img_name);
            } else {
            }
        }
        return redirect()->route('trainer.index');
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
        $trainer = Trainer::findOrFail($id);
        $departments = Department::all();
        $designations = Designation::all();
        $courses = Training::all();
        return view('trainer.edit', compact('trainer','departments','designations','courses'));
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
        $trainer = Trainer::findOrFail($id);
        $img_name = $trainer->photo;

        $trainer->update(array_merge($request->all(), ['img_name' => $img_name]));
        if ($request->webimg !== null) {
            // got Webcam Image

            $binary_data = base64_decode($request->webimg);
            $result = file_put_contents('trainer_image/' . $img_name, $binary_data);
        } else {

            if ($request->hasFile('photo')) {
                Image::make($request->file('photo'))->resize(250, 250)->save('trainer_image/' . $img_name);
            } else {
            }
        }
        return redirect()->route('trainer.index');
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
