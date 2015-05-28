<?php
/**
 *  Example REST API GET call
 */


$headers = array(
    "Host: " . "www.myhost.com",
    "Connection: " . "keep-alive",
    "User-Agent: " . "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36",
    "Accept: " . "*/*",
    "DNT:" . "1",
    "Referer:" .  "www.myhost.com/welcome.htm",
    "Accept-Encoding:" . "gzip,deflate,sdch",
    "Accept-Language:" . "en-US,en;q=0.8",
    "Cookie:" . "acct_table#pageNavPos=1; session=xxxxxxxx"
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://myhost.com/rest/system/license");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$output = curl_exec($ch);

if(curl_errno($ch))
{

    echo curl_errno($ch) . "\n";
    echo 'error:' . curl_error($ch);
    echo "\n";
} else {

        $result = json_decode($output,true);
        print_r($result);
}

curl_close($ch);
