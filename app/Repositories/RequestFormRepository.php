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
        if ($name == 'getAllActive') {
            if (count($arguments) == 0) {
                return $this->getAllActiveAdmin();
            }
            else if (count($arguments) == 1) {
                return $this->getAllActiveUser($arguments[0]);
            }
        }
    }

    public function getAllActiveUser($userId) {
        return $this->requestForm->where('user_id', $userId)
            ->where('status_id', '<>', status_completed_id())
            ->where('status_id', '<>', status_cancelled_id())
            ->latest()
            ->get();
    }

    public function getAllActiveAdmin() {
        return $this->requestForm
        ->where('status_id', '<>', status_completed_id())
        ->where('status_id', '<>', status_cancelled_id())
        ->get();
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

    public function getByRequestNo($requestNo) {
        return $this->requestForm->where('request_no', $requestNo)->first();
    }

    public function create(array $data) {
        $requestForm = $this->requestForm->create($data);
        $requestForm->update([
            'request_no' => generateRequestNo($requestForm->id),
        ]);
        return $requestForm;
    }

    public function update($id, array $data) {
        $this->getById($id)->update($data);
    }

    public function delete($id) {
        $this->getById($id)->delete();
    }
}
