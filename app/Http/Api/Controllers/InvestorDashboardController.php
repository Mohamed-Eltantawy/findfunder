<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Investment;

class InvestorDashboardController extends Controller
{
    public function index()
    {
        $companies = Company::withCount('investments')->get();
        return view('investor.dashboard', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::with('investments')->findOrFail($id);
        $minInvestment = $company->investments->min('amount');
        $totalRaised = $company->investments->sum('amount');
        return view('investor.company', compact('company', 'minInvestment', 'totalRaised'));
    }
}

