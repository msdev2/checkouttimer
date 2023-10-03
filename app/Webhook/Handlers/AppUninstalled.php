<?php
namespace App\Webhook\Handlers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Msdev2\Shopify\Models\Session;
use Shopify\Webhooks\Handler;

class AppUninstalled implements Handler
{
    public function handle(string $topic, string $shopName, array $requestBody): void
    {
        $shop = mShop($shopName);
        if($shop){
            $shop->is_uninstalled = 1;
            $shop->uninstalled_at = Carbon::now();
            $shop->save();
            $charges = $shop->activeCharge;
            if($charges){
                $charges->status = 'canceled';
                $charges->cancelled_on = Carbon::now();
                $charges->description = 'Cancel due to uninstall app';
                $charges->save();
                if($charges->type == "recurring" && $charges->$charges->charge_id > 0){
                    mRest($shop)->delete('recurring_application_charges/'.$charges->charge_id)->getDecodedBody();
                }
            }
            Session::where("shop",$shopName)->delete();
        }
    }
}
