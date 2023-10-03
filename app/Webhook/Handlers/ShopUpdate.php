<?php
namespace App\Webhook\Handlers;

use Illuminate\Support\Facades\Log;
use Msdev2\Shopify\Utils;
use Shopify\Webhooks\Handler;

class ShopUpdate implements Handler
{
    public function handle(string $topic, string $shopName, array $requestBody): void
    {
        $shop = Utils::getShop($shopName);
        $shop->log("webhook called",[$topic, $shopName, $requestBody]);
        if($shop && !empty($requestBody)){
            if(isset($requestBody["domain"])) $shop->domain = $requestBody["domain"];
            $shop->detail = $requestBody;
            $shop->save();
        }
    }
}
