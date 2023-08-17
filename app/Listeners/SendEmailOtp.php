<?php

namespace App\Listeners;

use App\Services\OtpService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendEmailOtp
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $this->otpService->sendEmailVerificationOTP($event->user->email);
    }
}
