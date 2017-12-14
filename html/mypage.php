<?php
    session_start();
?>
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
            <a href="index.php">Ordinary Colleage Students</a>
            <li><a href="reserve.html">Reservation</a></li>
            <li class="dropdown">
                Log out
                <div class="dropdown-content">
                    <a href="logout.php">Log Out</a>
                </div>

            </li>
        </ul>

    </header>
    <nav>

        <div class="nav-content">
            <div class="nav-content-inner">
                <div class="info">
                    <?php
                    if($_SESSION["status"] == "log_in") {
                        $user_id = $_SESSION["id"];
                        $query = "SELECT * FROM reservation WHERE id='$user_id'";
                        $db = new PDO("mysql:dbname=smash", "root", "root");
                        $rows = $db->query($query);
                    ?>
                        <h2>#<?= $user_id ?>님의 My Page</h2>
                        <div class="grid">
                        <ul id="Grid">
                            <li>학생정보
                                <div class = "infor">    
                                    <p>이름써주시고</p> <p>학번써주시구</p> <p>학과써주세요</p>
                                </div>           
                                <div class="bt">
                                    <a href=""><button>회원정보수정</button></a>
                                <div>
                            </li>
                            <li>예약확인
                                <div class = "infor">
                                    <p>방번호써주시고</p> <p>예약날짜써주시고</p> <p>시간써주세요</p>
                                </div>
                                <div class="bt">
                                    <a href=""><button>예약변경</button></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <?php
                    } else {
                        echo("<script>location.replace('index.php');</script>");
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
