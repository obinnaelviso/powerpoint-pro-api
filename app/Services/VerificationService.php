<?php

namespace App\Services;

use App\Enums\OtpEnum;
use App\Repositories\OtpRepository;

class VerificationService {

    protected $otpRepo;

    public function __construct(OtpRepository $otpRepo) {
        $this->otpRepo = $otpRepo;
    }

    public function verifyPhone(string $phone, string $otpCode) : bool {
        $otp = $this->otpRepo->get($phone, OtpEnum::PHONE_VERIFICATION);
        if ($otp && ($otp->otp == $otpCode)) {
            $otp->delete();
            return true;
        } else {
            return false;
        }
    }

    public function verifyEmail(string $email, string $otpCode) : bool {
        $otp = $this->otpRepo->get($email, OtpEnum::EMAIL_VERIFICATION);
        if ($otp && ($otp->otp == $otpCode)) {
            $otp->delete();
            return true;
        } else {
            return false;
        }
    }
}
