<?php

namespace App\Http\Controllers;

use App\Models\Models\Collection;
use App\Models\Models\Expense;
use App\Models\Models\Member;
use App\Models\Models\NonMember;
use DateTime;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function collection()
    {
        $collections = Collection::all();
        $members = Member::all();
        return view('account.collection-view', compact('collections', 'members'));
    }

    public function collectionCreate()
    {
        $members = Member::where('is_active', 1)->get();

        return view('account.collection-add', compact('members'));
    }

    public function collectionStore(Request $request)
    {
        $fd = new DateTime($request->from_date);
        $ld = new DateTime($request->to_date);

        $request->merge([
            'from_date' => $fd->format('Y-m-01'),
            'to_date' => $ld->format('Y-m-t'),
            'amount' => $request->t_amount
        ]);

        // return $request->all();

        Collection::create($request->all());

        session()->flash('status', "Collection Successful");
        return redirect()->back();
    }

    public function collectionDelete($id)
    {
        $c = Collection::find($id);
        $c->delete();

        session()->flash('status', "Deleted Successfully");
        return redirect()->back();
    }

    public function collectionFilter(Request $request)
    {
        // return $request->all();
        $collections = Collection::all();
        $members = Member::all();


        if ($request->bill_type !== null) {
            $collections = Collection::where('bill_type', $request->bill_type)->get();
        }

        if ($request->from_date !== null || $request->to_date !== null) {
            $collections = Collection::where('transaction_date', '>=', $request->from_date  ?? date('Y-m-d'))
                ->where('transaction_date', '<=', $request->to_date ?? date('Y-m-d'))->get();
        }

        if ($request->member !== null) {
            $collections = Collection::where('name', $request->member)->get();
        }

        return view('account.collection-view', compact('collections', 'members'));
    }


    //expense
    public function expense()
    {
        $expenses = Expense::with('member')->get();
        return view('account.expense-view', compact('expenses'));
    }


    public function expenseCreate()
    {
        $members = Member::all();
        return view('account.expense-add', compact('members'));
    }


    public function expenseStore(Request $request)
    {
        $month = $request->month . "-01";
        Expense::create(array_merge($request->all(), ['month' => $month]));

        session()->flash('status', "Created Successfully");
        return redirect()->back();
    }


    public function ajax($id)
    {
        $member = Member::where('membership_no', $id)->select('full_name')->first();
        if ($member === null) {
            $member = NonMember::where('membership_no', $id)->select('full_name')->first();
            $member->type = "Non Member";
        } else $member->type = "Member";
        return $member;
    }


    public function expenseFilter(Request $request)
    {
        // return $request->all();
        $expenses = Expense::with('member')->get();

        if ($request->bill_type !== null) {
            $expenses = Expense::where('bill_type', $request->bill_type)->get();
        }

        if ($request->from_date !== null || $request->to_date !== null) {
            $expenses = Expense::where('transaction_date', '>=', $request->from_date  ?? date('Y-m-d'))
                ->where('transaction_date', '<=', $request->to_date ?? date('Y-m-d'))->get();
        }

        return view('account.expense-view', compact('expenses'));
    }

    public function index()
    {
        $collections = Collection::all();
        $members = Member::all();

        return view('account.subscription', compact('collections', 'members'));
    }

    public function dueCollection()
    {

        $members = Member::where('is_active', 1)->doesnthave('due')->with('collection')->paginate(100);
        // $data = Member::where('is_active', 1)->with(['collection' => function ($q) {
        //     $q->where('to_date', '>', date('Y-m-d'))->latest()->first();
        // }])
        // ->whereHas('collection')
        // ->select('membership_no')
        // ->paginate();

        // $members = Member::where('is_active', 1)->whereNotIn('membership_no', $data)->with('collection')->paginate(10);

        // return $members;

        return view('account.due', compact('members'));
    }
}
