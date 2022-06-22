<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository {
    protected $setting;
    public function __construct(Setting $setting) {
        $this->setting = $setting;
    }
    public function getAll() {
        return $this->setting->all();
    }
    public function getByKey($key) {
        return $this->setting->where('key', $key)->first();
    }
    public function create(array $data) {
        return $this->setting->create($data);
    }
    public function updateByKey($key, array $data) {
        $this->getByKey($key)->update($data);
    }
}
