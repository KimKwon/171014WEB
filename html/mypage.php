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
            <li><a href="reserve.php">Reservation</a></li>
            <li><a href="contactus.html">Contact us</a></li>
            <!-- <li><a href="aboutus.html">About us</a></li> -->
            <li class="dropdown">
                My Page
                <div class="dropdown-content">
                    <a href="mypage.php?logged=false">Log Out</a>
                </div>

            </li>
        </ul>

    </header>
    <nav>
        <div class="nav-content">
            <div class="nav-content-inner">
                <div class="info">
                    <?php
                    if($_COOKIE["id"]) {
                        $user_id = $_COOKIE["id"];
                        $query = "SELECT * FROM reservation WHERE id='$user_id'";
                        $db = new PDO("mysql:dbname=smash", "root", "root");
                        $rows = $db->query($query);
                    ?>
                        <h1><?= $user_id ?></h1>
                        <table>
                            <tr><td>Room number</td><td>Time</td><td>Purpose</td><td>Population</td>
                    <?php
                            foreach ($rows as $row) {
                    ?>
                            <tr><td><?= $row["reserve_room_no"] ?></td><td><?= $row["reserve_date"] ?></td><td><?= $row["purpose"] ?></td><td><?= $row["population"] ?></td>
                    <?php
                        }
                    ?>
                        </table>
                    <?php
                    } else {
                        echo("<script>location.replace('index.html');</script>");
                    }
                    ?>
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
