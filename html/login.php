<?php
$id = $_POST["us_id"];
$pw = $_POST["us_pw"];

try{
    $DBname = "SMASH";
    $db = new PDO("mysql:dbname=$DBname;port=8888;host:localhost","root","root");
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "connected!\n";
    $user = $db->query("SELECT user_id, user_pw FROM user_info;");

}catch(PDOException $e){
  echo $e->getMessage();
}
$flag_log = 0;
foreach ($user as $us) {
  if($us["user_id"]==$id && $us["user_pw"]==$pw){
    $flag_log = 1;
    break;
  }
}
if($flag_log){
  echo "login success";
  echo "Welcome, $id";
  echo("<script>location.replace('mypage.php?logged=true&id=$id');</script>");
}
else{
  echo "fail";
}

 ?>
