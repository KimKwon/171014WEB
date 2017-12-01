<?php
	session_start();

	$id = $_POST["us_id"];
	$pw = $_POST["us_pw"];

	try{
		$db = new PDO("mysql:dbname=smash;host:localhost","root","root");
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$user = $db->query("SELECT user_id, user_pw FROM user_info;");
		
		$flag_log = false;
		foreach($user as $us) {
			if($us["user_id"] == $id && $us["user_pw"] == $pw){
				$flag_log = true;
				break;
			}
		}
	
		if($flag_log) {
			$_SESSION["id"] = $id;
			$_SESSION["status"] = "log_in";
			header("Location: index.php");
		} else {
			echo "fail";
		}
	} catch(PDOException $e){
		echo $e->getMessage();
	}
?>
