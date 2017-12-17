<?php
    session_start();
    if(!empty($_POST)) {
        try {
            $id = $_SESSION["id"];
            $room_no = $_POST["reserve_room_no"];
            $reserve_time = $_POST["reserve_time"];
            $reserve_date = $_REQUEST['date'];
            $period = $_POST['reserve_period'];
            $population = $_POST["form_population"];
            $purpose = $_POST["form_purpose"];
            $db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $iroom_no = intval($room_no);
            $_reserve_time = intval($reserve_time);
            $ipopulation = intval($population);

            $query = "INSERT INTO reservation(id, reserve_date, reserve_time, reserve_room_no,reserve_period , purpose, population) VALUES ('$id', '$reserve_date', '$reserve_time' ,$iroom_no, $period ,'$purpose', $ipopulation);";
            $db->query($query);

            // header("Location: reserve.php");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
