<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class TokenService {

    protected $userRepo;

    public function __construct(UserRepository $userRepo) {
        $this->userRepo = $userRepo;
    }
    public function generateLoginToken(array $data) : array {
        $user = $this->userRepo->getByEmail($data['email']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken($data['device_name'])->plainTextToken;
        return [
            'user' => new UserResource($user),
            'token' => $token
        ];
    }

    public function revokeAllToken() : void {
        auth()->user()->tokens()->delete();
    }
}

