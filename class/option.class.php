<?php
class Option {
  private $api;
  	function __construct()
  	{
  			$this->api = new CurlHelper();

  	}
  function cal_day($y, $m){
    $number = cal_days_in_month(CAL_GREGORIAN, $m, $y);
    return $number;

  }

  function make_date($y,$m, $d){
    $data=$y."-".$m."-".$d;
    $data=strtotime($data);
    return date("Y-m-d", $data);

  }
  function tot(array $array, $state,$date){
    $tot=0;
    foreach ($array as $key => $value) {

      foreach ($value as $k => $v) {
        if($state=="CLOSED"){
            $d=strtotime($value['closeAt']);
        }else{
            $d=strtotime($value['createdAt']);
        }

        $d=date("Y-m-d", $d);
        if($d<=$date){
        switch ($value['state']) {
          case $state:
            $tot++;
            break;

          default:
            // code...
            break;
        }

      }
    }
    }
    return $tot;
}
function tot_today(array $array, $state,$date){
  $tot=0;

  foreach ($array as $key => $value) {

    foreach ($value as $k => $v) {

      $d=strtotime($value['createdAt']);
      $d=date("Y-m-d", $d);
      if($d == $date){
      switch ($value['state']) {
        case $state:
          $tot++;
          break;

        default:
          // code...
          break;
      }

    }
  }
  }
  return $tot;
}
function media(array $array, $date){

  $qnt=count($array);
  $res=0;
  foreach ($array as $key => $value) {
     foreach ($value as $k => $v) {
       $d=strtotime($value['closeAt']);
       $d=date("Y-m-d", $d);
       if($d<=$date){
          if(!$value['closeInMin'] ){
            $res+=$v;
      }
    }
  }
}
$media=$res/$qnt;
$media= $this->creatempo($media);
return $media;

}
function creatempo($int)
 {

  return  gmdate('H:i', ($int * 60));
 }
}
