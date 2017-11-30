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

    <link href="css/reserve.css" rel="stylesheet">
    
    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js" type="text/javascript"></script>
    
    <script src="js/reserve.js" type="text/javascript"></script>

</head>

<body>


    <header>
        <ul>
            <a href="index.php">Ordinary Colleage Students</a>
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
                        $room_no = $_GET["room_number"];
                        if(!isset($room_no)) {
                            $room_no = 0;
                        }
                    ?>
                    <ul>
                        <div class="broom">
                            <li class="rnum froom"><a href="reserve.php?room_number=1"><button>SR#1</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=2"><button>SR#2</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=3"><button>SR#3</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=4"><button>SR#4</button></a></li>
                        </div>

                        <div class="sroom">
                            <li class="rnum"><a href="reserve.php?room_number=5"><button>SR#5</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=6"><button>SR#6</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=7"><button>SR#7</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=8"><button>SR#8</button></a></li>
                            <li class="rnum"><a href="reserve.php?room_number=9"><button>SR#9</button></a></li>
                        </div>
                    </ul>
                </div>
                <div class="timetable">
<!--
                    <ul>
                        <?php
                        if($room_no != 0) {
                            try {
                                $query = "SELECT room_date, room_check FROM room WHERE room_no = $room_no;";
                                $db = new PDO("mysql:dbname=smash", "root", "root");
                                $rows = $db->query($query);
                        ?>
                                <ul>
                                <?php foreach($rows as $row) { ?>
                                    <li>
                                        <?php if($row["room_check"] == 'FALSE') { ?>
                                            <a href="get_reservation_info.php?room_number=<?= $room_no ?>&date=<?= $row["room_date"] ?>"><?= $row["room_date"] ?></a>
                                        <?php } else { ?>
                                            <?= $row["room_date"] ?>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                                </ul>
                        <?php
                            } catch (PDOException $e) {
                                echo "fail";
                            }
                        }
                        ?>
                    </ul>
-->
                    
                    <table>
                        
                        <tr>
                            <th>TIME</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th>
                        </tr>
                        
                        <tr>
                            <td >TIME</td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td><td class="time"></td>
                        </tr>
                        
                        
                        
                    </table>
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
