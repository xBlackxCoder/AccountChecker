<?php

error_reporting(0);
set_time_limit(0);
date_default_timezone_set('Asia/Kolkata');

$code = $_GET['listxB'];

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  $str = explode($end, $str[1]);
  return $str[0];
}
$Proxy = "p.webshare.io:80";
$proxyauth = 'otisjsyq-rotate:xpvsyw8mvrwd';

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.ftrftcx.net/vpn_servers?activation_code='.$code.'&ca_version=2&client_version=6.7.1&conn_requests=1&device_id=1e1393434736d16bd978d3ca01511b28793c196111cf88ddbfb8c3219f0bb579&device_name=Windows&dpi=hdpi&include_country_and_region=1&include_pptp_l2tp_ipsec_servers=1&include_recommended_clusters=1&include_sstp_servers=1&os_version=win10.0.0&show_messages=1&smart_location=1&smartdns=1');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_PROXY, $Proxy);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyauth);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.ftrftcx.net',
'User-Agent: Go-http-client/1.1',
'Connection: close',
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_TIMEOUT, 400); //timeout in seconds
$result = curl_exec($ch);

$expiry = trim(strip_tags(getStr($result,'<expiration_date>','</expiration_date>')));
$status = trim(strip_tags(getStr($result,'<status>','</status>')));

if(strpos($result, "https://www.vlycgtx.com/latest")){
echo '<span class="badge badge-success">Live</span> <span class="badge badge-success">✓</span> <span class="badge badge-success">' . $code . ' </span> <span class="badge badge-success">✓</span>  <span class="badge badge-success">Expiry: '.$expiry.'</span> <span class="badge badge-success">✓</span>  <span class="badge badge-success">Status: '.$status.'</span> <span class="badge badge-success">✓</span></br>';  
}elseif(strpos($result, "Payment Verification Needed")){
echo '<span class="badge badge-danger">Dead</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $code . ' </span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">Message: Payment Verification Needed</span></br>';
}elseif(strpos($result, "authentication failed")){
echo '<span class="badge badge-danger">Dead</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $code . ' </span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">Message: Authencation Failed</span></br>';
}elseif(strpos($result, "auth failed, connection error")){
echo '<span class="badge badge-danger">Dead</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $code . ' </span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">Message: Invalid Length/Invalid Code</span></br>';
}else{
echo '<span class="badge badge-danger">Dead</span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">' . $code . ' </span> <span class="badge badge-danger">✕</span> <span class="badge badge-danger">Message: Error</span></br>';
}
curl_close($ch);
ob_flush();
?>
