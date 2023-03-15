<?php
/*$username = 'fadili101';
$password = 'Ibnghazala1';
$messages = array(
  array("from" => "1285589","to"=> "+212673697101","body"=> "Good morning , your balance is")

  
);  

$result = send_message( json_encode($messages), 'https://api.bulksms.com/v1/messages?auto-unicode=true&longMessageMaxParts=30', $username, $password );

if ($result['http_status'] != 201) {
  print "Error sending: " . ($result['error'] ? $result['error'] : "HTTP status ".$result['http_status']."; Response was " .$result['server_response']);
} else {
  //print "Response " . $result['server_response'];
  // Use json_decode($result['server_response']) to work with the response further
}

function send_message ( $post_body, $url, $username, $password) {
  $ch = curl_init( );
  $headers = array(
  'Content-Type:application/json',
  'Authorization:Basic '. base64_encode("$username:$password")
  );
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt ( $ch, CURLOPT_URL, $url );
  curl_setopt ( $ch, CURLOPT_POST, 1 );
  curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
  curl_setopt ( $ch, CURLOPT_POSTFIELDS, $post_body );
  // Allow cUrl functions 20 seconds to execute
  curl_setopt ( $ch, CURLOPT_TIMEOUT, 20 );
  // Wait 10 seconds while trying to connect
  curl_setopt ( $ch, CURLOPT_CONNECTTIMEOUT, 10 );
  $output = array();
  $output['server_response'] = curl_exec( $ch );
  $curl_info = curl_getinfo( $ch );
  $output['http_status'] = $curl_info[ 'http_code' ];
  $output['error'] = curl_error($ch);
  curl_close( $ch );
  return $output;
} */
echo send_sms("0673697101", "Mon Message", "MySenderID");
 
function send_sms($num, $texte, $emetteur) {
    $url = 'https://bulksms.ma/developer/sms/send';
 
    $fields_string = 'token=7DpOClnihO2cpaEIS5wT8rNg1&tel=' . $num . '&message=' . urlencode($texte). '&shortcode=' . $emetteur;
    
    $ch = curl_init();
 
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
 
    $result = curl_exec($ch);
 
    curl_close($ch);
    return $result;
}
?>         

                                                                                    