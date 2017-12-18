<?php
    session_start();
    if(!empty($_POST)) {
        try {
            $id = $_SESSION["id"];
            $db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");
    		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $reserved_date = $_POST["reservation"];
            foreach($reserved_date as $date){
                $db->exec("DELETE FROM reservation where id='$id' AND reserve_date='$date'");
            }

            // echo("<script>location.replace('mypage.php');</script>");
            header("Location: mypage.php");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
