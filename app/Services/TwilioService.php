<?php

namespace App\Services;

use Twilio\Rest\Client;

class TwilioService
{
    protected $config;
    public function __construct()
    {
        $this->config = config('twilio');
    }

    public function sendOtp($phoneNumber): void
    {
        $twilio = new Client($this->config['account_sid'], $this->config['token']);
        $twilio->verify->v2->services($this->config['twilio_verify_sid'])
            ->verifications
            ->create($phoneNumber, "sms");
    }

    public function verifyOtp($otpCode, $phoneNumber): bool
    {
        $twilio = new Client($this->config['account_sid'], $this->config['token']);
        $verification = $twilio->verify->v2->services($this->config['twilio_verify_sid'])
            ->verificationChecks
            ->create($otpCode, array('to' => $phoneNumber));
        return $verification->valid;
    }
}
