

<?php
$phoneNumber = "0673697101";
$message = "absent";
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://fabdo.ddns.net/sendSMS?phoneNumber=" . $phoneNumber . "&message=" . urlencode($message),
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if($response=="True"){
echo "ok";
}else echo "not";
?>

<?php
 /* $phone ='0673697101';
  $message = "Aller le Maroc";
  $url = "http://fabdo.ddns.net:80/sms";
  
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json; charset=utf-8'));
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $data = json_encode(array("phone" => $phone, "message" => $message));
  curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
  $resp = curl_exec($curl);
  curl_close($curl);
  echo $resp;*/
?>

<?php

/*$ch = curl_init();

//$text_message=urlencode($text);
curl_setopt($ch, CURLOPT_URL, 'http://fabdo.ddns.net:80/sms');
curl_setopt($ch, CURLOPT_ENCODING ,"");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "{'id':'123','phone':'0673697101','message':'$text2'}");

$headers = array();
$headers[] = 'Content-Type: application/json';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);
echo $result;*/
//0673253636
/*header('Content-type: text/html; charset=utf-8');
$url = "http://fabdo.ddns.net:80/sms";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_ENCODING, "");
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json; charset=utf-8'));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$name = "Majd Adam";
$date = '16/11/2022';
$matiere="Mathematiques";
$hell = utf8_decode( " AAA"   );
$data = <<<DATA
{
  "Id": 123,
  'phone':'0673697101', 
  'message':"عرماLycee abderrahman ibn ghazala vous informe que votre enfant s'est absenté de la leçon de mathématiques le 10/10/2022"
}
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

$resp = curl_exec($curl);
curl_close($curl);

echo $resp;


    
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
