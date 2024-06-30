<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvestmentRound extends Model
{
    use HasFactory;



    protected $fillable = [
        'name',
        'goal_amount',
    ];
}


