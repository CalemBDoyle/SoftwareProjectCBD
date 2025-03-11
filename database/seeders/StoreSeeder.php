<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use Carbon\Carbon;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Store::insert([
            ['store_name' => 'Tesco', 'status' => 'Operational', 'rating' => 4.0, 'lat' => 52.794977, 'long' => -6.160455],
            ['store_name' => 'SuperValue', 'status' => 'Operational', 'rating' => 3.5, 'lat' => 52.793316, 'long' => -6.164274],
            ['store_name' => 'Lidl', 'status' => 'Operational', 'rating' => 3.5, 'lat' => 52.795354, 'long' => -6.163137],
        ]);
    }
}
