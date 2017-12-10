<?php

$delay = 0;



try {


    if (isset($_REQUEST["delay"])) {
    	$delay = max(0, min(60, (int) filter_chars($_REQUEST["delay"])));
    }

    if ($delay > 0) {
    	sleep($delay);
    }

    $room_no = $_GET["room_number"];
    $query = "SELECT reserve_time FROM reservation WHERE reserve_room_no = $room_no";
    $db = new PDO("mysql:dbname=smash", "root", "root");
    $rows = $db->query($query);
    $time_table = array();
    for($i = 0; $i < 20; $i++) {
        $time_table[$i] = "possible";
    }
    foreach($rows as $row) {
        $time_table[$row["reserve_time"]] = "impossible";
    }

    // header("Content-type: application/json");
    // print "{\n  \"times\": [\n";
    // for($i = 9; $i < 20; $i++) {
    //     if($i != 9) { print ",\n"; }
    //     $status = $time_table[$i];
    //     print "{\"time\": $i, \"status\": \"$status\"}";
    //     if($i == 19) { print "\n"; }
    // }
    // print "  ]\n}\n";
    $xmldoc = new DOMDocument();
    $times_tag = $xmldoc->createElement("times"); //<times>
    $times_tag -> setAttribute("room",$room_no);
    for ($i=9; $i < 20 ; $i++) {
        $time_tag = $xmldoc->createElement("time"); //<time>
        $time_tag->setAttribute("t", $i);
        $time_tag->setAttribute("st", $time_table[$i]);
        $times_tag->appendChild($time_tag);
    }
    $xmldoc -> appendChild($times_tag);
    header("Content-type: text/xml");
    print $xmldoc->saveXML();




} catch (PDOException $e) {
    echo "fail";
}
?>
