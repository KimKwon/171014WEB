<?php
	session_start();

	$id = $_POST["us_id"];
	$pw = $_POST["us_pw"];

	try{
		// $db = new PDO("mysql:dbname=smash;host:localhost","root","root");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$user = $db->query("SELECT user_id, user_pw FROM user_info;");

		$flag_log = false;
		$flag_pw = false;
		foreach($user as $us){
			if($us["user_id"] == $id){
				if($us["user_pw"] == $pw){
					$flag_log = true;
					$flag_pw = true;
					break;
				}
				else{
					$flag_log = true;
					break;
				}
			}
		}

		if($flag_log && $flag_pw) {
			$_SESSION["id"] = $id;
			$_SESSION["status"] = "log_in";
			echo("<script>location.replace('index.php');</script>");
		} else if($flag_log){
			echo "<script>window.alert('일치하지 않는 비밀번호입니다.');</script>";
			echo("<script>location.replace('signin.html');</script>");
		} else{
			echo "<script>window.alert('존재하지 않는 아이디입니다.');</script>";
			echo("<script>location.replace('signin.html');</script>");
		}

	} catch(PDOException $e){
		echo $e->getMessage();
	}
?>
