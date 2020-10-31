<?php

namespace App\Http\Controllers;

use App\Models\Models\Category;
use App\Models\Models\Designation;
use App\Models\Models\Education;
use App\Models\Models\Factory;
use App\Models\Models\Member;
use App\Models\Models\NonMember;
use App\Models\Models\Religion;
use App\Models\Models\Union;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use DataTables;

use Image;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unions = Union::where('is_active', 1)->get();
        $factories = Factory::where('is_active', 1)->get();
        $members = Member::where('is_active', 1)->paginate(100);
        return view('member.view', compact('members', 'unions', 'factories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unions = Union::where('is_active', 1)->get();
        $factories = Factory::where('is_active', 1)->get();
        $member_categories = Category::where('status', 1)->get();
        $educations = Education::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        $religions = Religion::where('status', 1)->get();

        return view('member.add', compact('unions', 'factories', 'member_categories', 'educations', 'designations', 'religions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $full_name = $request->firstname . " " . $request->lastname;
        $membership_no = substr(time(), 1) . rand(0, 9);

        $img_name = uniqid() . ".jpg";

        Member::create(array_merge($request->all(), ['membership_no' => $membership_no], ['full_name' => $full_name], ['photo' => $img_name]));

        if ($request->webimg !== null) {
            // got Webcam Image

            $binary_data = base64_decode($request->webimg);
            $result = file_put_contents('member_image/' . $img_name, $binary_data);
        } else {

            if ($request->hasFile('photo')) {
                Image::make($request->file('photo'))->resize(250, 250)->save('member_image/' . $img_name);
            } else {
            }
        }

        session()->flash('status', "Created Successfully");


        if ($request->has('exit')) {
            return redirect()->route('member.index');
        }

        if ($request->has('save')) {
            return redirect()->route('member.create');
        }
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
        //
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
        //
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


    public function filter(Request $request)
    {
        return $request->all();
    }

    //non-member
    public function nonMember(Request $request)
    {
        $factories = Factory::where('is_active', 1)->get();
        $members = NonMember::where('is_active', 1)->paginate(100);
        $categories = Category::where('status', 1)->get();
        return view('member.view-non-member', compact('members', 'factories', 'categories'));
    }

    public function nonMemberCreate()
    {
        $factories = Factory::where('is_active', 1)->get();
        $member_categories = Category::where('status', 1)->get();
        $designations = Designation::where('status', 1)->get();
        $religions = Religion::where('status', 1)->get();

        return view('member.add-non-member', compact('factories', 'member_categories', 'designations', 'religions'));
    }

    public function nonMemberStore(Request $request)
    {
        // return $request->all();
        $full_name = $request->firstname . " " . $request->lastname;
        $membership_no = substr(time(), 1) . rand(0, 9);

        $img_name = uniqid() . ".jpg";

        NonMember::create(array_merge($request->all(), ['membership_no' => $membership_no], ['full_name' => $full_name], ['photo' => $img_name]));

        if ($request->webimg !== null) {
            // got Webcam Image

            $binary_data = base64_decode($request->webimg);
            $result = file_put_contents('member_image/' . $img_name, $binary_data);
        } else {

            if ($request->hasFile('photo')) {
                Image::make($request->file('photo'))->resize(250, 250)->save('member_image/' . $img_name);
            } else {
            }
        }

        session()->flash('status', "Created Successfully");


        if ($request->has('exit')) {
            return redirect()->route('non-member.index');
        }

        if ($request->has('save')) {
            return redirect()->route('non-member.create');
        }
    }
}
