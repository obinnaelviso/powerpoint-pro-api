<?php

namespace App\Services;

use App\Http\Resources\SettingResource;
use App\Repositories\SettingRepository;

class SettingService {

    protected $settingRepo;

    public function __construct(SettingRepository $settingRepo) {
        $this->settingRepo = $settingRepo;
    }

    public function getAll() {
        return SettingResource::collection($this->settingRepo->getAll());
    }

    public function create(array $data) {
        return new SettingResource($this->settingRepo->create($data + ['status_id' => status_active_id()]));
    }

    public function update($key, array $data) {
        $this->settingRepo->updateByKey($key, $data);
        return new SettingResource($this->settingRepo->getByKey($key));
    }

    public function updateAll(array $settings) {
        foreach ($settings as $setting) {
            $this->settingRepo->updateByKey($setting['key'], $setting);
        }
    }
}
