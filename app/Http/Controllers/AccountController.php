<?php

namespace App\Http\Controllers;

use App\Models\Models\Collection;
use App\Models\Models\Expense;
use App\Models\Models\Member;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function collection()
    {
        $collections = Collection::all();
        $members = Member::all();
        return view('account.collection-view',compact('collections','members'));
    }
    public function collectionCreate()
    {
        return view('account.collection-add');
    }


    //expense
    public function expense()
    {
        $expenses = Expense::all();
        return view('account.expense-view',compact('expenses'));
    }
    public function expenseCreate()
    {
        $members = Member::all();
        return view('account.expense-add',compact('members'));
    }
}
