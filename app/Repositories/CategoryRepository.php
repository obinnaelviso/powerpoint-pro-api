<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    protected $category;

    public function __construct(Category $category) {
        $this->category = $category;
    }

    public function getAll() {
        return $this->category->orderBy('title', 'asc')->get();
    }

    public function getById($id) {
        return $this->category->find($id);
    }

    public function create(array $data) {
        return $this->category->create($data);
    }

    public function update($id, array $data) {
        $this->getById($id)->update($data);
    }

    public function delete($id) {
        $this->getById($id)->delete();
    }
}
