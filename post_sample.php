<?php


$auth_code = base64_encode("username:passsword");

$data = array("param1", "param2");
$json_data = json_encode($data);

$headers = array(
    "Host: " . "mydomain.com",
    "Connection: " . "keep-alive",
    "Content-Length: " .  strlen($json_data),
    "User-Agent: " . "Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36",
    "Content-Type: application/json",
    "Accept: " . "*/*",
    "DNT:" . "1",
    "Referer:" .  "mydomain.com/welcome.htm",
    "Accept-Encoding:" . "gzip,deflate,sdch",
    "Accept-Language:" . "en-US,en;q=0.8",
    "Authorization: Basic $auth_code"
);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://mydomain.com/rest/system/domains");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS,$json_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


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
