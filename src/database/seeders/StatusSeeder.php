<?php

namespace Database\Seeders;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create(['content' => '良好']);
        Status::create(['content' => '目立った傷や汚れ無し']);
        Status::create(['content' => 'やや傷やよごれあり']);
        Status::create(['content' => '状態が悪い']);
    }
}
