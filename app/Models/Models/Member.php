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
}
