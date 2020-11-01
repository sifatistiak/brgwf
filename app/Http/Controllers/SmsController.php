<?php

namespace App\Http\Controllers;

use App\Models\Models\Sms;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function index()
    {
        $items = Sms::all();
        return view('sms.view', compact('items'));
    }


    public function store(Request $request)
    {
        Sms::create($request->all());

        session()->flash('status', "SMS Sent Successfully");

        return redirect()->route('sms.index');
    }
}
