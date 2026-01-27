<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class JourneyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("journey_user")->insert([
            [
                "journey_id" => 1,
                "user_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "journey_id" => 1,
                "user_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "journey_id" => 2,
                "user_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "journey_id" => 3,
                "user_id" => 2,
                "created_at" => now(),
                "updated_at" => now()
            ],
            [
                "journey_id" => 3,
                "user_id" => 1,
                "created_at" => now(),
                "updated_at" => now()
            ],
        ]);
    }
}
