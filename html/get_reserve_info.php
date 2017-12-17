<?php
$num = substr($_POST['room_no'], -1);
$time = $_POST['room_time'];
$date = $_POST['date'];



$db = new PDO("mysql:dbname=smash;host:localhost","root","root");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$query = "SELECT * FROM reservation NATURAL JOIN user_info WHERE (reserve_date='2017-12-17' AND reserve_time=13 AND reserve_room_no=1);";
$rows = $db->query($query);
$a = empty($rows);
foreach ($rows as $row ) {
  $us_em = $row['user_email'];
  $purpose = $row['purpose'];
  $population = $row['population'];
}


$info = array('us_em' => $us_em,'purpose'=> $purpose,'population'=>$population);
echo json_encode($info);

 ?>
