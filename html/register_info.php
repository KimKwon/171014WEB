<?php
    session_start();
    if(!empty($_POST)) {
        try {
            $id = $_SESSION["id"];
            $room_no = $_GET["room_number"];
            $reserve_date = $_POST["date"];
            $population = $_POST["population"];
            $purpose = $_POST["purpose"];
            $db = new PDO("mysql:dbname=smash", "root", "root");
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "$id,,,,,, $room_no,,,,,,,$reserved_date,,,,,$population,,,,$purpose";
            $iroom_no = intval($room_no);
            $ipopulation = intval($population);
            $query = "INSERT INTO reservation(id, reserve_date, reserve_room_no, purpose, population) VALUES ('$id', '$reserve_date', $iroom_no, '$purpose', $ipopulation);";
            $db->query($query);

            header("Location: reserve.html");
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
