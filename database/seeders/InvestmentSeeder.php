<?php

// database/seeders/InvestmentSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Investment;
use App\Models\Company;
use App\Models\Investor;

class InvestmentSeeder extends Seeder
{
    public function run()
    {
        $companies = Company::all();
        $investors = Investor::all();

        foreach ($companies as $company) {
            foreach ($investors as $investor) {
                Investment::create([
                    'company_id' => $company->id,
                    'investor_id' => $investor->id,
                    'amount' => rand(1000, 100000),
                ]);
            }
        }
    }
}
