<?php

namespace App\Jobs;

use App\Services\WhatsAppService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWhatsAppNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $targetNumber;
    protected $message;

    public function __construct(string $targetNumber, string $message)
    {
        $this->targetNumber = $targetNumber;
        $this->message = $message;
    }

    public function handle(): void
    {
        $whatsappService = new WhatsAppService();
        $whatsappService->sendMessage($this->targetNumber, $this->message);
    }
}
