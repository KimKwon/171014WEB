<?php

try {
    $room = array();
    $date = $_POST["date"];


    for($h=1;$h<=9;$h++){
        $query = "SELECT reserve_time , reserve_period FROM reservation WHERE reserve_room_no = $h AND reserve_date = '$date' ";
		$db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $rows = $db->query($query);
        $time= array();
        // print "$query";


        foreach($rows as $row) {
            $start = $row["reserve_time"];
            $end = $start + $row["reserve_period"];
            for($j=$start;$j<$end;$j++){
                array_push($time, $j);
            }

        }
        $room[$h] = $time;
    }
    // print_r ($room[1]);

    $xmldoc = new DOMDocument();
    $Smash_tag = $xmldoc->createElement("Smash"); //<times>
    for($j=0;$j<=8;$j++){
        // $j=1;
        $room_tag = $xmldoc->createElement("room");
        $room_tag -> setAttribute("room", "room$j");
        // print $room[$j][0];

        foreach ($room[$j] as $value) {
            $temp = $value;
            $reser_time_tag = $xmldoc-> createElement("time");
            $reser_time = $xmldoc -> createTextNode($temp);
            $reser_time_tag -> appendChild( $reser_time );
            $room_tag -> appendChild($reser_time_tag);
        }
        $Smash_tag -> appendChild($room_tag);
    }
    $xmldoc -> appendChild($Smash_tag);
    header("Content-type: text/xml");
    print $xmldoc->saveXML();
    // print $date;



} catch (PDOException $e) {
    echo "fail";
}
?>
