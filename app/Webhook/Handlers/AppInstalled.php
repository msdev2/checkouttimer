<?php
namespace App\Webhook\Handlers;

use App\Models\GeoBlocker;
use App\Models\Previews;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Msdev2\Shopify\Models\Shop;

class AppInstalled //implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;//, Queueable;
    protected $shop;
    public function __construct(Shop $shop) {
        $this->shop = $shop;
    }
    public function handle(): void
    {
        $data = $this->shop->previews;
        if(!$data){
            $data = new Previews();
            $data->popup = [
                "heading"=>'You are blocked!!!',
                "headingBackgroundColor"=>'#000000',
                "headingFontSize"=>24,
                "headingFontColor"=>'#ffffff',
                "description"=>'This Page Is not Allowed in Your Country',
                "bodyFontSize"=>16,
                "bodyFontColor"=>'#000000',
                "bodyBackgroundColor"=>'#ffffff',
                "footerBackgroundColor"=>'#cccccc',
                "button1Text"=>'OK',
                "button1BackgroundColor"=>'#387000',
                "button1FontColor"=>'#ffffff',
                "button2Text"=>'Cancel',
                "button2BackgroundColor"=>'#000000',
                "button2FontColor"=>'#ffffff'
            ];
            $data->blocker = [
                "backgroundColor"=>'#000000',
                "heading"=>'You are blocked!!!',
                "headingFontSize"=>24,
                "headingFontColor"=>'#ffffff',
                "description"=>'This Page Is not Allowed in Your Country',
                "descriptionFontSize"=>16,
                "descriptionFontColor"=>'#ffffff'
            ];
            $data->shop_id = $this->shop->id;
            $data->status = 1;
            $data->save();
        };
        $data = $this->shop->geoBlocker;
        if(!$data){
            $data = new GeoBlocker();
            $data->shop_id = $this->shop->id;
            $data->data = [];
            $data->save();
        }
    }
}
