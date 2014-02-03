<?php
/*

Request:

POST /oauth2/token HTTP/1.1
Host: api.domain.com
Cache-Control: no-cache

Post Parameters:
{
"grant_type": "password",
"username": "myname",
"password": "mypass"

}

Sample Response:
{
    "access_token": "abns57dnsdg94r5dd9naxf9",
    "expires_in": 3600,
}

*/

$curl = curl_init( "https://api.domain.com/oauth2/token" );
curl_setopt( $curl, CURLOPT_POST, true );
curl_setopt( $curl, CURLOPT_POSTFIELDS, '{
	"grant_type": "password",
	"username": "myusername",
	"password": "pass"
}');

curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl, CURLOPT_HTTPHEADER, Array("Content-Type: text/plain"));
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
$auth = curl_exec($curl);
if($auth  === false)
{
    echo 'Curl error: ' . curl_error($curl);
}
else
{
    echo 'Got token details';
    $decoded_data = json_decode($auth);
    echo "<br>token: " . $decoded_data->access_token;
}

