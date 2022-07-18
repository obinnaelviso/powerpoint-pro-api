<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageRevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            ['title' => '1 - 20', 'amount' => 2000, 'status_id' => status_active_id()],
            ['title' => '21 - 30', 'amount' => 2500, 'status_id' => status_active_id()],
            ['title' => '31 - 40', 'amount' => 3000, 'status_id' => status_active_id()],
            ['title' => '41 - 50', 'amount' => 3500, 'status_id' => status_active_id()],
            ['title' => '51 - 60', 'amount' => 4000, 'status_id' => status_active_id()],
            ['title' => '61 - 70', 'amount' => 4500, 'status_id' => status_active_id()],
            ['title' => '71 - 80', 'amount' => 5000, 'status_id' => status_active_id()],
            ['title' => '81 - 90', 'amount' => 5500, 'status_id' => status_active_id()],
            ['title' => '91 - 100', 'amount' => 6000, 'status_id' => status_active_id()],
            ['title' => 'Above 100', 'amount' => 6500, 'status_id' => status_active_id()],
        ];
        foreach ($packages as $package) {
            \App\Models\PackageRev::create($package);
        }
    }
}
