<?php

namespace App\Services;

use App\Enums\RoleEnum;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;

class RegisterService {
    protected $userRepo;

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }

    public function register(array $data) {
        $user = $this->userRepo->create($data);

        $user->assignRole(RoleEnum::USER);

        event(new Registered($user));

        return $user;
    }
}
