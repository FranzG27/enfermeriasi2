<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Booking extends Model
{
    use HasFactory;
    protected $guarded= [];

    public function nurse(){

        return $this->belongsTo(User::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
