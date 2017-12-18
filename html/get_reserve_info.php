<?php
session_start();
$id = $_SESSION['id'];
$num = substr($_POST['room_no'], -1);
$time = $_POST['room_time'];
$date = $_POST['date'];


$db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
// $db = new PDO("mysql:dbname=smash;host:localhost","root","root");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
// $query = "SELECT * FROM reservation inner join user_info on user_info.user_id=reservation.id WHERE (reserve_date='$date' AND reserve_time=$time AND reserve_room_no=$num);";
$query = "SELECT * FROM reservation inner join user_info on user_info.user_id=reservation.id WHERE (reserve_date='$date' AND reserve_room_no=$num);";
$rows = $db->query($query);
foreach ($rows as $row) {
  $_time = $row['reserve_time'];
  $_period = $row['reserve_period'];
  if($_time<= $time && $time <= $_time+$_period){
    $us_em = $row['user_email'];
    $purpose = $row['purpose'];
    $population = $row['population'];
  }
}



$info = array('us_em' => $us_em,'purpose'=> $purpose,'population'=>$population);
echo json_encode($info);
 ?>
