<?php

namespace App\Services;

use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;

class CategoryService {

    protected $categoryRepo;

    public function __construct(CategoryRepository $categoryRepo) {
        $this->categoryRepo = $categoryRepo;
    }

    public function getAll() {
        return CategoryResource::collection($this->categoryRepo->getAll());
    }

    public function create(array $data) {
        return new CategoryResource($this->categoryRepo->create($data + ['status_id' => status_active_id()]));
    }

    public function update($id, array $data) {
        $this->categoryRepo->update($id, $data);
        return new CategoryResource($this->categoryRepo->getById($id));
    }

    public function delete($id) {
        return $this->categoryRepo->delete($id);
    }
}
