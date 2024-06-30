<?php
// app/Models/Company.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'startup_id'];

    public function startup()
    {
        return $this->belongsTo(Startup::class);
    }

    public function investments()
    {
        return $this->hasMany(Investment::class);
    }
}
