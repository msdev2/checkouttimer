<?php

namespace App\Http\Controllers;

use App\Jobs\AddCodeToTheme;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function backend(Request $request) {
        $data = [
            'themeId'=>'current',
            'extensionEnabled'=> false,
            'extensionId'=>env('SHOPIFY_CHECKOUT_TIMER_ID','09d54cd7-4671-4b8a-9f98-7070a4f4e742'),
            'appName'=> 'pro-checkout-countdown'
        ];
        // $res= $this->getDetails('https://instagram.com/mraganksoni');
    	// dd($res);
        return view('backend',compact('data'));
    }
    private function getDetails($pageUrl) {
        $url = $pageUrl;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $result = curl_exec($ch);
        curl_close($ch);
        $output = [];//json_decode($result, true);
        $metaPos = strpos($result, "<meta content=");
        if($metaPos != false)
        {
            $meta = substr($result ,$metaPos,70);

            //meghdare followers
            $followerPos = strpos($meta , "Followers");
            $followers = substr($meta , 15 , $followerPos-15);
            $output[0] = $followers;

            //meghdare followings
            // $commaPos = strpos($meta , ',');
            $followingPos = strpos($meta, 'Following');
            $followings = substr($meta , $followerPos+10 , $followingPos - ($followerPos+10));
            $output[1] = $followings;


            //meghdare posts
            $seccondCommaPos = $followingPos + 10;
            $postsPos = strpos($meta, 'Post');
            $posts = substr($meta, $seccondCommaPos , $postsPos - $seccondCommaPos);
            $output[2] = $posts;
            
              //image finder
                $imgPos = strpos($result, "og:image");
                $image = substr($result , $imgPos+19 , 200);
                $endimgPos = strpos($image, "/>");
                $finalImagePos = substr($result, $imgPos+19 , $endimgPos-2);
                $output[3] = $finalImagePos;

            return $output;
        }
        else
        {
            return null;
        }
    }
    public function index() {
        $shop = mShop();
        $whitelist = $shop->getMetaData('whitelist');
        if($whitelist){
            return mSuccessResponse($whitelist);
        }
        return mErrorResponse();
    }
    public function store(Request $request) {
        $shop = mShop();
        $whitelist = $shop->setMetaData('whitelist', json_encode($request->input('whitelist')));
        return mSuccessResponse($whitelist);
    }
}
