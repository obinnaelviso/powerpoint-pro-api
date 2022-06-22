<?php

namespace Database\Seeders;

use App\Repositories\PackageRepository;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(PackageRepository $packageRepo)
    {
        // 24 hours packages
        $package_1_1 = [
            'title' => '24 hours (1-30 slides)',
            'description' => 'Get your powerpoint slides ready within 24 hours',
            'min_duration' => 0,
            'max_duration' => 1,
            'min_slides' => 1,
            'max_slides' => 30,
            'amount' => 2500,
            'status_id' => status_active_id(),
        ];
        $package_1_2 = [
            'title' => '24 hours (31-50 slides)',
            'description' => 'Get your powerpoint slides ready within 24 hours',
            'min_duration' => 0,
            'max_duration' => 1,
            'min_slides' => 31,
            'max_slides' => 50,
            'amount' => 3000,
            'status_id' => status_active_id(),
        ];
        $package_1_3 = [
            'title' => '24 hours (51-75 slides)',
            'description' => 'Get your powerpoint slides ready within 24 hours',
            'min_duration' => 0,
            'max_duration' => 1,
            'min_slides' => 51,
            'max_slides' => 75,
            'amount' => 4000,
            'status_id' => status_active_id(),
        ];
        $package_1_4 = [
            'title' => '24 hours (76-100 slides)',
            'description' => 'Get your powerpoint slides ready within 24 hours',
            'min_duration' => 0,
            'max_duration' => 1,
            'min_slides' => 76,
            'max_slides' => 100,
            'amount' => 4000,
            'status_id' => status_active_id(),
        ];
        $package_1_5 = [
            'title' => '24 hours (101+ slides)',
            'description' => 'Get your powerpoint slides ready within 24 hours',
            'min_duration' => 0,
            'max_duration' => 1,
            'min_slides' => 101,
            'max_slides' => 999,
            'amount' => 5000,
            'status_id' => status_active_id(),
        ];
        // 2 - 3 days packages
        $package_2_3_1 = [
            'title' => '2-3 days (1-30 slides)',
            'description' => 'Get your powerpoint slides ready within 2-3 days',
            'min_duration' => 2,
            'max_duration' => 3,
            'min_slides' => 1,
            'max_slides' => 30,
            'amount' => 2000,
            'status_id' => status_active_id(),
        ];
        $package_2_3_2 = [
            'title' => '2-3 days (31-50 slides)',
            'description' => 'Get your powerpoint slides ready within 2-3 days',
            'min_duration' => 2,
            'max_duration' => 3,
            'min_slides' => 31,
            'max_slides' => 50,
            'amount' => 2500,
            'status_id' => status_active_id(),
        ];
        $package_2_3_3 = [
            'title' => '2-3 days (51-75 slides)',
            'description' => 'Get your powerpoint slides ready within 2-3 days',
            'min_duration' => 2,
            'max_duration' => 3,
            'min_slides' => 51,
            'max_slides' => 75,
            'amount' => 3000,
            'status_id' => status_active_id(),
        ];
        $package_2_3_4 = [
            'title' => '2-3 days (76-100 slides)',
            'description' => 'Get your powerpoint slides ready within 2-3 days',
            'min_duration' => 2,
            'max_duration' => 3,
            'min_slides' => 76,
            'max_slides' => 100,
            'amount' => 3500,
            'status_id' => status_active_id(),
        ];
        $package_2_3_5 = [
            'title' => '2-3 days (101+ slides)',
            'description' => 'Get your powerpoint slides ready within 2-3 days',
            'min_duration' => 2,
            'max_duration' => 3,
            'min_slides' => 101,
            'max_slides' => 999,
            'amount' => 4500,
            'status_id' => status_active_id(),
        ];

        // Beyond 3 packages
        $package_4_1 = [
            'title' => 'Beyond 3 days (1-30 slides)',
            'description' => 'Get your powerpoint slides ready beyond 3 days',
            'min_duration' => 4,
            'max_duration' => 365,
            'min_slides' => 1,
            'max_slides' => 30,
            'amount' => 1500,
            'status_id' => status_active_id(),
        ];
        $package_4_2 = [
            'title' => 'Beyond 3 days (31-50 slides)',
            'description' => 'Get your powerpoint slides ready beyond 3 days',
            'min_duration' => 4,
            'max_duration' => 365,
            'min_slides' => 31,
            'max_slides' => 50,
            'amount' => 2000,
            'status_id' => status_active_id(),
        ];
        $package_4_3 = [
            'title' => 'Beyond 3 days (51-75 slides)',
            'description' => 'Get your powerpoint slides ready beyond 3 days',
            'min_duration' => 4,
            'max_duration' => 365,
            'min_slides' => 51,
            'max_slides' => 75,
            'amount' => 2500,
            'status_id' => status_active_id(),
        ];
        $package_4_4 = [
            'title' => 'Beyond 3 days (76-100 slides)',
            'description' => 'Get your powerpoint slides ready beyond 3 days',
            'min_duration' => 4,
            'max_duration' => 365,
            'min_slides' => 76,
            'max_slides' => 100,
            'amount' => 3000,
            'status_id' => status_active_id(),
        ];
        $package_4_5 = [
            'title' => 'Beyond 3 days (101+ slides)',
            'description' => 'Get your powerpoint slides ready beyond 3 days',
            'min_duration' => 4,
            'max_duration' => 365,
            'min_slides' => 101,
            'max_slides' => 999,
            'amount' => 4000,
            'status_id' => status_active_id(),
        ];

        // Create packages
        $packageRepo->create($package_1_1);
        $packageRepo->create($package_1_2);
        $packageRepo->create($package_1_3);
        $packageRepo->create($package_1_4);
        $packageRepo->create($package_1_5);

        $packageRepo->create($package_2_3_1);
        $packageRepo->create($package_2_3_2);
        $packageRepo->create($package_2_3_3);
        $packageRepo->create($package_2_3_4);
        $packageRepo->create($package_2_3_5);

        $packageRepo->create($package_4_1);
        $packageRepo->create($package_4_2);
        $packageRepo->create($package_4_3);
        $packageRepo->create($package_4_4);
        $packageRepo->create($package_4_5);
    }
}
