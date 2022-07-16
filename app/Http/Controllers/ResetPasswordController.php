<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Services\UserService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    use PasswordValidationRules;

    protected $userService;

    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|exists:users,email',
            // 'old_password' => ['required', 'string', new \App\Rules\OldPassword],
            'password' => $this->passwordRules(),
        ]);

        $user = $this->userService->updatePassword($request->all());
        if ($user) {
            return apiSuccess($user, 'Password changed successfully!');
        } else {
            return apiError('Something went wrong!');
        }
    }
}
