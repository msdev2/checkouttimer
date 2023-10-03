<?php
// echo "<pre>";print_r($_SERVER);echo "</pre>";exit;
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Content-Type");

if($_GET["id"]==""){
    echo "{}";
    exit;
}
if($_GET["type"]=="reel"){
    echo getReel($_GET["id"] ?? '');
}else{
    echo getMedia($_GET["id"] ?? '');
}
function getMedia($id = '')
{
    $PostArray['auth_token'] = "BSS8342022-DFS012"; // REQUIRED FOR CONNECTION
    $PostArray['reel_type'] = "web_reels"; // Section to query
    $PostArray['id'] = $id; // Unique reel ID
    $PostArray['output_format'] = 'json'; // Unique reel ID
    //https://companyname.gosimian.com/api/simian/get_media
    $Response = callAPI("https://beaconstreet.gosimian.com/api/simian/get_media", $PostArray);
    header("Content-Type: text/json");
    print_r($Response);
}
function callAPI($URL, $PostArray)
{
    $PostString = "";
    foreach($PostArray as $n=>$v) $PostString .= "&{$n}=".urlencode($v);
    $ch = curl_init($URL);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $PostString);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $Response = curl_exec($ch);
    return $Response;
}
function getReel($id = '')
{
    $PostArray['auth_token'] = "BSS8342022-DFS012"; // REQUIRED FOR CONNECTION
    $PostArray['reel_type'] = "web_reels"; // Section to query
    $PostArray['reel_id'] = $id; // Unique reel ID
    $PostArray['output_format'] = 'json'; // Unique reel ID
    $Response = callAPI("https://beaconstreet.gosimian.com/api/simian/get_reel", $PostArray);
    header("Content-Type: text/json");
    print_r($Response);
}