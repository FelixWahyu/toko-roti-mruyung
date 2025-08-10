<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $token;

    public function __construct()
    {
        $this->token = config('services.fonnte.token');
    }

    public function sendMessage($to, $message)
    {
        if (!$this->token) {
            Log::error('Fonnte API token is not set.');
            return false;
        }

        $targetNumber = preg_replace('/\D/', '', $to);

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $targetNumber,
                'message' => $message,
            ]);

            Log::info('Fonnte API Response:', $response->json());

            if ($response->successful() && isset($response->json()['status']) && $response->json()['status'] === true) {
                Log::info('WhatsApp message sent successfully to ' . $targetNumber);
                return true;
            } else {
                Log::error('Failed to send WhatsApp message to ' . $targetNumber . ': ' . $response->body());
                return false;
            }
        } catch (\Exception $e) {
            Log::error('Exception when sending WhatsApp message: ' . $e->getMessage());
            return false;
        }
    }
}
