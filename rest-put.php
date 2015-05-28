<?php


$pass = md5('mypass');
$data = array('name'=>'auth','value'=>"admin $pass");
$data_json = json_encode($data);

$headers = array(
    "Host: myhost.com",
    "Connection: " . "keep-alive",
    "Content-Length: " .  strlen($data_json),
    "Origin: myhost.com",
    "User-Agent: " . "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36",
    "Content-Type: application/json",
    "Accept: " . "*/*",
    "DNT:" . "1",
    "Referer:" .  "myhost.com/welcome.htm",
    "Accept-Encoding:" . "gzip,deflate,sdch",
    "Accept-Language:" . "en-US,en;q=0.8",
    "Cookie: acct_table#pageNavPos=1"
);



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://myhost.com/rest/system/session");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


// execute the request
$output = curl_exec($ch);
if(curl_errno($ch))
{

    echo curl_errno($ch) . "\n";
    echo 'error:' . curl_error($ch);
    echo "\n";
} else {

	$result = json_decode($output,true);
        print_r($output);
}



curl_close($ch);




