<?php
namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvestmentController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'investor_id' => ['required', 'exists:investors,id'],
            'startup_id' => ['required', 'exists:startups,id'],
            'amount' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $investment = Investment::create($request->all());
        return response()->json(['message' => 'Investment created successfully', 'investment' => $investment], 201);
    }
}
