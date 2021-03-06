<?php

namespace App\Services;

use App\Http\Resources\RequestFormResource;
use App\Repositories\RequestFormRepository;

class RequestFormService {

    protected $requestFormRepo;
    protected $packageService;

    public function __construct(RequestFormRepository $requestFormRepo, PackageService $packageService) {
        $this->requestFormRepo = $requestFormRepo;
        $this->packageService = $packageService;
    }

    public function getAllAdmin($query = "") {
        if ($query == 'active') {
            $requestForms = $this->requestFormRepo->getAllActive();
        } else {
            $requestForms = $this->requestFormRepo->getAll();
        }
        return RequestFormResource::collection($requestForms);
    }

    public function getAllUser($query = "") {
        if ($query == 'active') {
            $requestForms = $this->requestFormRepo->getAllActive(auth()->user()->id);
        } else {
            $requestForms = $this->requestFormRepo->getAll(auth()->user()->id);
        }
        return RequestFormResource::collection($requestForms);
    }

    public function create(array $data) {
        // $package = $this->packageService->search($data['duration'], $data['slides']);
        return new RequestFormResource($this->requestFormRepo->create($data + [
            'status_id' => status_pending_id(),
            'user_id' => auth()->user()->id
        ]));
    }

    public function update($id, array $data) {
        // $duration = array_key_exists('duration', $data) ? $data['duration'] : $requestForm->duration;
        // $slides = array_key_exists('slides', $data) ? $data['slides'] : $requestForm->slides;

        // $package = $this->packageService->search($duration, $slides);
        $this->requestFormRepo->update($id, $data);
        return new RequestFormResource($this->requestFormRepo->getById($id));
    }

    public function get($id) {
        return new RequestFormResource($this->requestFormRepo->getById($id));
    }

    public function delete($id) {
        return $this->requestFormRepo->delete($id);
    }

    public function uploadPaymentReceipt($id, $file) {
        $requestForm = $this->requestFormRepo->getById($id);
        $requestForm->clearMediaCollection('receipt');
        $requestForm->addMedia($file)->toMediaCollection('receipt');
        return $this->update($id, ['status_id' => status_processing_id()]);
    }

    public function approve($id) {
        return $this->update($id, ['status_id' => status_active_id()]);
    }

    public function cancel($id) {
        return $this->update($id, ['status_id' => status_cancelled_id()]);
    }

    public function complete($id) {
        return $this->update($id, ['status_id' => status_completed_id()]);
    }

    public function pending($id) {
        return $this->update($id, ['status_id' => status_pending_id()]);
    }
}
