<?php

// database/seeders/CompanySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Startup;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $startups = Startup::all();

        foreach ($startups as $startup) {
            Company::create([
                'name' => 'Company ' . $startup->id,
                'description' => 'Description for Company ' . $startup->id,
                'startup_id' => $startup->id,
            ]);
        }
    }
}
