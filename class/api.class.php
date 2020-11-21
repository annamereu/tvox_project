<?php
class CurlHelper {

public static function perform_http_request( $query)
{

  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, 'https://cc.teleniasoftware.com/datamodel/query');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $query);
  curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

  $headers = array();
  $headers[] = 'Accept-Encoding: gzip, deflate, br';
  $headers[] = 'Content-Type: application/json';
  $headers[] = 'Accept: application/json';
  $headers[] = 'Connection: keep-alive';
  $headers[] = 'Dnt: 1';
  $headers[] = 'Origin: https://cc.teleniasoftware.com';
  $headers[] = 'X-Telenia-Apikey: a88a93c8-ae26-4088-aa92-56ea6cf53a6d';
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $r=curl_exec($ch);
  $result = json_decode(curl_exec($ch),true);

  if (curl_errno($ch)) {
      echo 'Error:' . curl_error($ch);
  }

    curl_close($ch);
    $json_data = json_encode($r);
     return $result;

}
  public function total_ticket_open($day){

    $query = '{"query":"query { \n  ticketsCount(search: \n    {\n       state:OPEN \n      \n      createdAt: {operator: \n        BETWEEN valueLeft: \"2020-01-01T00:00:00Z\"\n        \n  valueRight: \"'.$day.'T23:59:59Z\"      }  }) }"}';
    return $query;
  }
  public function total_ticket_open_today($day){
    $query = '{"query":"query { \n  ticketsCount(search: \n    {\n       state:OPEN \n      \n      createdAt: {operator: \n        BETWEEN valueLeft: \"'.$day.'T00:00:00Z\"\n        \n  valueRight: \"'.$day.'T23:59:59Z\"      }  }) }"}';

    return $query;
  }
  public function total_ticket_closed_today($day){
    $query = '{"query":"query { \n  ticketsCount(search: \n    {\n       state:CLOSED \n      \n      closeAt: {operator: \n        BETWEEN valueLeft: \"'.$day.'T00:00:00Z\"\n        \n  valueRight: \"'.$day.'T23:59:59Z\"      }  }) }"}';
  return $query;
  }

  public function total_ticket_time($day){
    $query = '{"query":"query { \n  tickets(search: \n    {\n       state:CLOSED \n      \n      closeAt: {operator: \n        BETWEEN valueLeft: \"'.$day.'T00:00:00Z\"\n        \n  valueRight: \"'.$day.'T23:59:59Z\"  }  }) {timeUnit  }}"}';

    return $query;
  }

public function create_array($array, $date, $file){
foreach ($array as $key => $value) {
  foreach ($value as $k => $v) {
    $dato= $v;
  }
}

  $fp= fopen($file, "w+");
  fwrite($fp, $dato);
}




}
?>
