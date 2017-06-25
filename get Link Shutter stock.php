<?php 
	$origin = 'link shutter stock';
	$token = 'bỏ token vào đây';
	$pattern ='/https?:\/\/(www\.)?shutterstock\.com\/([a-z]{2}\/)?image-(photo|vector|illustration)\/[a-zA-Z0-9-]+-([0-9]+)/';
	$regex = preg_match($pattern, $origin, $matches);
	$url = "https://graph.facebook.com/v2.8/ssimg_".$matches[4]."?fields=preview_url&access_token=".$token;
	$json = file_get_contents($url);
	$json = json_decode ($json,true);
	$url = $json['preview_url'];
	$urlArr = explode('&url=', $url);
	$url = $urlArr[1];
?>