<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Smash Revervation</title>

    <link href="css/style.css" rel="stylesheet">

    <link href="css/layout.css" rel="stylesheet">

    <link href="css/book.css" rel="stylesheet">

</head>

<body>


    <header>
        <ul>
            <a href="index.html">Ordinary Colleage Students</a>
            <li><a href="contactus.html">Contact us</a></li>
            <!-- <li><a href="aboutus.html">About us</a></li> -->
            <li>Booking</li>
        </ul>

    </header>
    <nav>
        <div class="nav-content">
            <div class="nav-content-inner">
                <div class="room">
                    <?php
                        $room_no = $_GET["roomNumber"];
                        if(!isset($room_no)) {
                            $room_no = 0;
                        }
                    ?>
                    <ul>
                        <?php for($i = 1; $i <= 8; $i++) { ?>
                            <li><a href="reserve.php?roomNumber=<?= $i ?>">SR#<?= $i ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <div class="timetable">
                    <ul>
                        <?php
                            if($room_no != 0) {
                                try {
                                    $DBname = "SMASH";
                                    $query = "select room_date from room where room_no = $room_no;";
                                    $db = new PDO("mysql:dbname=$DBname", "root", "seonghoon");
                                    $rows = $db->query($query);
                        ?>
                                    <ul>
                                    <?php foreach($rows as $row) { ?>
                                        <li><?= $row["room_date"] ?></li>
                                    <?php } ?>
                                    </ul>
                        <?php
                                } catch (PDOException $e) {
                                    echo "fail";
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

    </nav>
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 class="section-heading">Completely synergize resource taxing relationships</h2>
                    <p class="text-light">Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>