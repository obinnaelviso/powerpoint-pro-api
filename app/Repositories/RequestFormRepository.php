<?php

namespace App\Repositories;

use App\Models\RequestForm;

class RequestFormRepository {
    protected $requestForm;

    public function __construct(RequestForm $requestForm) {
        $this->requestForm = $requestForm;
    }

    public function __call($name, $arguments) {
        if ($name == 'getAll') {
            if (count($arguments) == 0) {
                return $this->getAllAdmin();
            }
            else if (count($arguments) == 1) {
                return $this->getAllUser($arguments[0]);
            }
        }
    }

    public function getAllUser($id) {
        return $this->requestForm->where('user_id', $id)->latest()->get();
    }

    public function getAllAdmin() {
        return $this->requestForm->latest()->get();
    }

    public function getById($id) {
        return $this->requestForm->find($id);
    }

    public function create(array $data) {
        return $this->requestForm->create($data);
    }

    public function update($id, array $data) {
        $this->getById($id)->update($data);
    }

    public function delete($id) {
        $this->getById($id)->delete();
    }
}
