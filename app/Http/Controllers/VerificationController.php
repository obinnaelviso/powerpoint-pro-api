<?php

namespace App\Http\Controllers;

use App\Services\VerificationService;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    protected $verificationService;

    public function __construct(VerificationService $verificationService) {
        $this->verificationService = $verificationService;
    }

    public function phone(Request $request) {
        $request->validate([
            'phone' => 'required|string|size:11|regex:/^[0-9]{11}$/',
            'otp' => 'required|string'
        ]);

        $isVerified = $this->verificationService->verifyPhone(formatPhoneNumber($request->phone), $request->otp);

        if ($isVerified) {
            return apiSuccess(null, "Phone verified successfully!");
        } else {
            return apiError("Invalid OTP! Please input correct one.");
        }
    }

    public function email(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'otp' => 'required|string'
        ]);

        $isVerified = $this->verificationService->verifyEmail($request->phone, $request->otp);

        if ($isVerified) {
            return apiSuccess(null, "Email verified successfully!");
        } else {
            return apiError("Invalid OTP! Please input correct one.");
        }
    }
}
