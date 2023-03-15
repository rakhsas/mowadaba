<?php
//0673253636
header('Content-type: text/html; charset=utf-8');
$url = "http://fabdo.ddns.net:80/sms";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json; charset=utf-8'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$name = "Majd Adam";
$date = '16/11/2022';
$matiere="Mathematiques";
$hell = urlencode( " مؤسسة  عبد الرحمان ابن غزالةie"   );
$data = <<<DATA
{
  "Id": 123,
  'phone':'0673697101', 
  'message':$hell; 
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;
/*

    
/*echo "oui";
$url = "http://dolibarr.iotsmartnet.com:8888/sms";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);

$data = array(
    'id' => 123,
    'phone' => '0673697101',
    'message' => 'salamo3alaykom cest abdelhak'
);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
echo $output;
//
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$data = <<<DATA
{
  "Id": 123,
  'phone':'0673697101', 
  'message':"salamo3alaykom cest abdelhak" 
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;*/
//curl --header "Content-Type: application/json" --request POST --data "{'id':'123','phone':'0661631341','message':'salamo3alaykom test'}" http://dolibarr.iotsmartnet.com:8888/sms
?>
