<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $guarded = ['firstname','lastname','save','exit'];

    public function religion(){
        return $this->belongsTo(Religion::class);

    }

    public function union(){
        return $this->belongsTo(Union::class);

    }

    public function factory(){
        return $this->belongsTo(Factory::class);
    }

    public function collection(){
        return $this->hasOne(Collection::class,'membership_id','membership_no')->latest();
    }

    public function due(){
        return $this->hasOne(Collection::class,'membership_id','membership_no')->where('to_date', '>', date('Y-m-d'))->latest();
    }
}
