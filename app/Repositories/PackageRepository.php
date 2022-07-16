<?php

namespace App\Repositories;

use App\Models\Package;

class PackageRepository {
    protected $package;

    public function __construct(Package $package) {
        $this->package = $package;
    }

    public function getAll() {
        return $this->package->all();
    }

    public function getById($id) {
        return $this->package->find($id);
    }

    public function create(array $data) {
        return $this->package->create($data);
    }

    public function search($duration, $slides) {
        return $this->package->where('max_duration', '>=', (int)$duration)
            ->where('max_slides', '>=', (int)$slides)->first();
    }

    public function update($id, array $data) {
        $this->getById($id)->update($data);
    }

    public function delete($id) {
        $this->getById($id)->delete();
    }
}
