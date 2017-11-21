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
            
            $query = "UPDATE room SET room_check='TRUE' WHERE (room_no=$room_no AND room_date='$reserve_date');";
            $db->query($query);
            
            $iroom_no = intval($room_no);
            $ipopulation = intval($population);
            $query = "INSERT INTO reservation(id, reserve_date, reserve_room_no, purpose, population) VALUES ('$id', '$reserve_date', $iroom_no, '$purpose', $ipopulation);";
            $db->query($query);
            
            header("Location: reserve.php?room_number=$room_no");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
