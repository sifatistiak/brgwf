<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $guarded = ['save'];

    public function member(){
        return $this->belongsTo(Member::class,'pay_to', 'membership_no');
    }
}
