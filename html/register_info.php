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
            //$id = db->quote($id);
            $rows = $db->query("SELECT reserve_date FROM reservation WHERE id = '$id'");
            foreach($rows as $row){
                if($row["reserve_date"] == $reserve_date){
                    echo "<script>window.alert('이미 오늘 예약하신 방이 존재합니다.');</script>"; 
                    //header("Location: reserve.php");
                    echo("<script>location.replace('reserve.php');</script>"); 
                    exit;
                }
            }
            $query = "INSERT INTO reservation(id, reserve_date, reserve_time, reserve_room_no,reserve_period , purpose, population) VALUES ('$id', '$reserve_date', '$reserve_time' ,$iroom_no, $period ,'$purpose', $ipopulation);";
            $db->query($query);

<<<<<<< HEAD
            header("Location: reserve.php");
=======
<<<<<<< HEAD
            //header("Location: reserve.php");
            //header를 사용하면 캐쉬가 꼬인다고 해서 자바로 바꿨습니다.
            echo("<script>location.replace('reserve.php');</script>"); 
=======
            header("Location: reserve.php");
>>>>>>> origin/master
>>>>>>> a781197448b6475df87e232a12d3fc8e91df94db
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
?>
