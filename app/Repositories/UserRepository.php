<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {
    public function create(array $data) {
        return User::create($data);
    }

    public function update(int $id, array $data)
    {
        $user = $this->getById($id);
        if ($user) {
            $user = $user->update([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name']
            ]);
            $user = $this->getById($id);
        } else {
            throw new \Exception('User not found');
        }
        return $user;
    }

    public function updatePassword(int $id, array $data)
    {
        $user = $this->getById($id);
        if ($user) {
            $user = $user->update([
                'password' => $data['password']
            ]);
            $user = $this->getById($id);
        } else {
            throw new \Exception('User not found');
        }
        return $user;
    }

    public function getById($id) {
        return User::find($id);
    }

    public function getByEmail($email) {
        return User::where('email', $email)->first();
    }

    public function getClassName() {
        return User::class;
    }
}
