<?php
    if(!empty($_POST)) {
        try {
            $id = $_COOKIE["id"];
            $room_no = $_GET["room_number"];
            $reserve_date = $_GET["date"];
            $population = $_POST["population"];
            $purpose = $_POST["purpose"];
            $db = new PDO("mysql:dbname=smash", "root", "root");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $query = "update room set room_check='TRUE' where (room_no=$room_no and room_date='$reserve_date');";
            $db->query($query);
            
            $iroom_no = intval($room_no);
            $ipopulation = intval($population);
            $query = "insert into reservation(id, reserve_date, reserve_room_no, purpose, population) values ('$id', '$reserve_date', $iroom_no, '$purpose', $ipopulation);";
            $db->query($query);
            
            header("Location: reserve.php?room_number=$room_no");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
