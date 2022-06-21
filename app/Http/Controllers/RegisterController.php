<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Repositories\UserRepository;
use App\Services\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    use PasswordValidationRules;

    protected $registerService;
    protected $userRepo;

    public function __construct(RegisterService $registerService, UserRepository $userRepo) {
        $this->registerService = $registerService;
        $this->userRepo = $userRepo;
    }

    public function register(Request $request) {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique($this->userRepo->getClassName()),
            ],
            'phone' => [
                'required',
                'string',
                'size:11',
                'regex:/^[0-9]{11}$/',
                Rule::unique($this->userRepo->getClassName())
            ],
            'password' => $this->passwordRules(),
        ]);

        $user = $this->registerService->register([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => formatPhoneNumber($request->phone),
            'password' => Hash::make($request->password),
            'phone_verified_at' => now(),
            'status_id' => status_pending_id(),
        ]);

        return apiSuccess($user, 'Registration successful!');
    }
}
