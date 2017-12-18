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
            <li><a href="reserve.php">Reservation</a></li>
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
                        $query = "SELECT user_id, student_id, department FROM user_info WHERE user_id='$user_id'";
                        $db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                        $rows = $db->query($query);
                    ?>
                        <h2>#<?= $user_id ?>님의 My Page</h2>
                        <div class="grid">
                        <ul id="Grid">
                            <div class = "grid-width">
                                <li>학생정보
                                    <div class = "infor">
                                        <?php foreach($rows as $row) { ?>
                                            <p>이름: <?= $row["user_id"] ?></p>
                                            <?php if($row["student_id"] == null) {?> <p>등록된 학번이 없습니다.</p>
                                            <?php } else {?> <p>학번: <?= $row["student_id"] ?></p> <?php } ?>
                                            <?php if($row["student_id"] == null) {?> <p>등록된 학과가 없습니다.</p>
                                            <?php } else {?> <p>학과: <?= $row["department"] ?></p> <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <div class="bt">
                                        <a href="modify_info.php"><button>회원정보수정</button></a>
                                    </div>
                                </li>
                            </div>
                            <div class = "grid-width">
                                <li>예약확인
                                    <div class = "infor" id="style-1">
                                        <?php $query = "SELECT * FROM reservation WHERE id='$user_id'";
                                            $rows = $db->query($query);
                                            if($rows->rowCount() == 0) {
                                        ?>
                                            <p>예약이 없습니다.</p>
                                        <?php
                                            } else {
                                        ?>
                                        <form action="delete_reservation.php" method="post">
                                            <table class ="tablemargin">
                                            <tr>
                                            <th></th><th>방번호</th><th>예약날짜</th><th>예약시간</th>
                                            </tr>
                                        <?php
                                                $checkbox_name = 1;
                                                foreach($rows as $row) {
                                        ?>
                                            <tr>
                                            <td><input type="checkbox" name="reservation[]" value="<?= $row['reserve_date'] ?>"></td>
                                            <td><?= $row["reserve_room_no"] ?></td>
                                            <td><?= $row["reserve_date"] ?></td>
                                            <td><?= $row["reserve_time"] . ":00"?></td>
                                            </tr>
                                        <?php   $checkbox_name++;
                                                } ?>
                                        <?php } ?>
                                            </table>
                                            <input type="submit" id="delete_reservation" value="예약취소">
                                        </form>
                                    </div>
                                </li>
                            </div>
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
