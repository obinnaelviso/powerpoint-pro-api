<?php

namespace App\Services;

use App\Http\Resources\BankAccountResource;
use App\Repositories\BankAccountRepository;

class BankAccountService {

    protected $bankAccountRepo;

    public function __construct(BankAccountRepository $bankAccountRepo) {
        $this->bankAccountRepo = $bankAccountRepo;
    }

    public function getAll() {
        return BankAccountResource::collection($this->bankAccountRepo->getAll());
    }

    public function create(array $data) {
        return new BankAccountResource($this->bankAccountRepo->create($data + ['status_id' => status_active_id()]));
    }

    public function update($id, array $data) {
        $this->bankAccountRepo->update($id, $data);
        return new BankAccountResource($this->bankAccountRepo->getById($id));
    }

    public function delete($id) {
        return $this->bankAccountRepo->delete($id);
    }
}
