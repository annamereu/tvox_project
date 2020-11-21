<?php
class Database {

  private $connection;
  function connect()
  {
        $this->connection =  mysqli_connect("62.149.150.157","Sql557066","033dddf6","Sql557066_4");
  }

  //execute for query
  function query($query, $mode){

          switch ($mode) {
            case 'select':
            //if select query, it return an array
              $do_query=mysqli_query($this->connection, $query);
              $a=array();
              while($d=mysqli_fetch_assoc($do_query)){//return array with the key from db
                $a[]=$d;
              }
              return $a;
              break;
          default:
          //in case of other type of query, it just execute the query
            $do_query=mysqli_query($this->connection, $query);
            break;
        }

  }
  function close(){
      mysqli_close($this->connection);
  }
  function check_query($data){
    $q = $this->query("SELECT COUNT(id) as count from tvox WHERE data ='".$data."'", "select");
    return $q[0]['count'];
  }
  function check_query_tot($data, $value){
    $q = $this->query("SELECT $value from tvox WHERE data ='".$data."'", "select");
    return $q[0][$value];
  }
}
 ?>
