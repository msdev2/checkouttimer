<?php
namespace App\Webhook\Handlers;

use App\Jobs\AddCodeToTheme;
use Illuminate\Support\Facades\Log;
use Shopify\Webhooks\Handler;

class ThemesPublish implements Handler
{
    public function handle(string $topic, string $shop, array $requestBody): void
    {
        // AddCodeToTheme::dispatch($shop,$requestBody['id']);
    }
}
