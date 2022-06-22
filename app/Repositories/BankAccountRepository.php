<?php

namespace App\Repositories;

use App\Models\BankAccount;

class BankAccountRepository {
    protected $bankAccount;

    public function __construct(BankAccount $bankAccount) {
        $this->bankAccount = $bankAccount;
    }

    public function getAll() {
        return $this->bankAccount->all();
    }

    public function getById($id) {
        return $this->bankAccount->find($id);
    }

    public function create(array $data) {
        return $this->bankAccount->create($data);
    }

    public function update($id, array $data) {
        $this->getById($id)->update($data);
    }

    public function delete($id) {
        $this->getById($id)->delete();
    }
}
