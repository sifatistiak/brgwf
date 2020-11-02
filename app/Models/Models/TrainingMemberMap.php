<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingMemberMap extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function training(){
        return $this->belongsTo(Training::class);
    }

    // public function member(){
    //     return $this->belongsTo(Member::class);
    // }

    public function trainer(){
        return $this->belongsTo(Trainer::class);
    }
}
