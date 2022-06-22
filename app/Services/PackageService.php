<?php

namespace App\Services;

use App\Http\Resources\PackageResource;
use App\Repositories\PackageRepository;

class PackageService {

    protected $packageRepo;

    public function __construct(PackageRepository $packageRepo) {
        $this->packageRepo = $packageRepo;
    }

    public function getAll() {
        return PackageResource::collection($this->packageRepo->getAll());
    }

    public function search(int $duration, int $slides) {
        return new PackageResource($this->packageRepo->search($duration, $slides));
    }

    public function create(array $data) {
        return new PackageResource($this->packageRepo->create($data + ['status_id' => status_active_id()]));
    }

    public function update($id, array $data) {
        $this->packageRepo->update($id, $data);
        return new PackageResource($this->packageRepo->getById($id));
    }

    public function delete($id) {
        return $this->packageRepo->delete($id);
    }
}
