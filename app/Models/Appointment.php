<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Appointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function nurse(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
