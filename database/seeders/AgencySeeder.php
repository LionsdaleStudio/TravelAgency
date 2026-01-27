<?php

namespace Database\Seeders;

use App\Models\Agency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Agency::create(
            [
                "name" => "Ibusz utazási iroda"
            ]
        );
         Agency::create(
            [
                "name" => "Safe Travels utazási iroda"
            ]
        );
         Agency::create(
            [
                "name" => "Die Hard Travel Agency"
            ]
        );
    }
}
