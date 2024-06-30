<?php

// app/Models/Investment.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'investor_id', 'amount'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function investor()
    {
        return $this->belongsTo(Investor::class);
    }
}
