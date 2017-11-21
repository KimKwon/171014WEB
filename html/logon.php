<?php
	$us_id = $_POST['u_id'];
	$us_pw = $_POST['u_pw'];
	$us_email = $_POST['u_email'];

	try{
		$db = new PDO("mysql:dbname=smash;host:localhost","root","root");
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$db->exec("INSERT INTO user_info(user_id,user_pw,user_email) values ('$us_id','$us_pw','$us_email');");
?>
		<script type="text/javascript">
			alert("가입이 완료되었습니다 <?=$us_id?> 님!");
		</script>
<?php
		echo("<script>location.replace('index.html');</script>");
	} catch(PDOException $e) {
		echo $e->getMessage();
	}
?>
