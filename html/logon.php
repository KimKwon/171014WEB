<?php
$us_id = $_POST['u_id'];
$us_pw = $_POST['u_pw'];
$us_email = $_POST['u_email'];



try{
    $db = new PDO("mysql:dbname=smash_user;port=8888;host:localhost","root","root");
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected!\n";
    // $db->exec("INSERT into user_info values (" . "$us_id" . "," .  "$us_pw" . "," . "$us_email" . ");");
    $db->exec("INSERT INTO user_info(user_id,user_pw,user_email) values ('$us_id','$us_pw','$us_email');");



}catch(PDOException $e){
  echo $e->getMessage();
}


?>
