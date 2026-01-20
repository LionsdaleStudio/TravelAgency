<?php

namespace Database\Seeders;

use App\Models\Journey;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Journey::create([
            "name" => "Bali",
            "price" => 700000,
            "travel_time" => 18.5,
            "visa" => true,
            "description" => "A hely, ahova eljutni nagyon drága és sokáig tart, de ott lenni nagyon olcsó. Ui.: A majmok lopnak..."
        ]);

        Journey::factory(10)->create();

       /*  DB::table("journeys")->insert(  [
            [//sor adatai
            // name => "blah"
            // created_at => now()
            // ],
            [//sor adatai],
            [//sor adatai],
        ]); */
    }
}
