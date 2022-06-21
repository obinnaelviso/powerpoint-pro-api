<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService {

    public $userRepo;
    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function update(array $data) {
        $user = $this->userRepo->update(auth()->user()->id, $data);
        return new UserResource($user);
    }

    public function updatePassword(array $data) {
        $user = $this->userRepo->getByEmail($data['email']);
        $user = $this->userRepo->updatePassword($user->id, ['password' => Hash::make($data['password'])]);
        return new UserResource($user);
    }
}
