<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    protected $token;

    public function __construct()
    {
        $this->token = env('FONNTE_API_TOKEN');
    }

    public function sendMessage($to, $message)
    {
        if (!$this->token) {
            Log::error('Fonnte API token is not set.');
            return false;
        }

        // Membersihkan nombor telefon daripada sebarang aksara bukan digit
        $targetNumber = preg_replace('/\D/', '', $to);

        try {
            $response = Http::withHeaders([
                'Authorization' => $this->token,
            ])->post('https://api.fonnte.com/send', [
                'target' => $targetNumber,
                'message' => $message,
                // 'countryCode' => '62',
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
