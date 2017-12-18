<?php
	$us_id = $_POST['u_id'];
	$us_pw = $_POST['u_pw'];
	$us_email = $_POST['u_email'];

	try{
		$db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		// $db = new PDO("mysql:dbname=smash;host:localhost","root","root");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$rows = $db->query("SELECT user_id FROM user_info WHERE user_id = '$us_id'");	
		// if id is duplicated, log_on is failed
		foreach($rows as $row){
			if($row["user_id"] == $us_id){
				echo "<script>window.alert('존재하는 아이디입니다.');</script>";
				echo("<script>location.replace('signup.html');</script>");
				exit;
			}	
		}

		$db->exec("INSERT INTO user_info(user_id,user_pw,user_email, student_id, department) values ('$us_id','$us_pw','$us_email', null, null);");
?>
		<script type="text/javascript">
			alert("가입이 완료되었습니다 <?=$us_id?> 님!");
		</script>
<?php
		echo("<script>location.replace('index.php?signed=true');</script>");
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
?>
