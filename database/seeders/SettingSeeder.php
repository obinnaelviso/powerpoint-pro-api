<?php

namespace Database\Seeders;

use App\Enums\SettingEnum;
use App\Services\SettingService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(SettingService $settingService)
    {
        $settings = [
            ['key' => SettingEnum::PHONE1, 'value' => ''],
            ['key' => SettingEnum::PHONE2, 'value' => ''],
            ['key' => SettingEnum::ADDRESS, 'value' => ''],
            ['key' => SettingEnum::WHATSAPP_PHONE, 'value' => ''],
            ['key' => SettingEnum::FACEBOOK, 'value' => ''],
            ['key' => SettingEnum::INSTAGRAM, 'value' => ''],
            ['key' => SettingEnum::FORM, 'value' => ''],
            ['key' => SettingEnum::EMAIL, 'value' => ''],
        ];

        foreach ($settings as $setting) {
            $settingService->create($setting);
        }
    }
}
