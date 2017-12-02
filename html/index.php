<?php
    session_start();
?>

<!DOCTYPE html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Smash Revervation</title>

    <link href="css/style.css" rel="stylesheet">

    <link href="css/layout.css" rel="stylesheet">

    <link href="css/about.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript">
      jQuery.noConflict();
      var j$ = jQuery;
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/time.js"></script>



</head>

<body>
    <div class="clock">
      <p><span id='clocker'></span></p>
    </div>
    <!-- <button type="button" id="fold" name="button">접기</button> -->
    <?php
        if(!isset($_SESSION["status"])) { $_SESSION["status"] = "log_out"; }
    ?>
    <div id="full">
        <header>
            <ul>
                <a href="index.php">Ordinary Colleage Students</a>
                <li><a href="reserve.php">Reservation</a></li>
                <li><a id='fold'>Server Time</a></li>
                <li><a href="#all">About us</a></li>
                    <!-- 천천히 내리는거 추가 해야함 -->
                <li class="dropdown">
<?php
                    if($_SESSION["status"] == "log_out") {
?>
                        sign up
                        <div class="dropdown-content">
                            <a href="signup.html">sign up</a>
                            <a href="signin.html">sign in</a>
                        </div>
<?php
                    } else {
?>
                        my info
                        <div class="dropdown-content">
                            <a href="mypage.php">my page</a>
                        </div>
<?php
                    }
?>
                </li>
            </ul>
        </header>

        <nav>
            <div class="nav-content">
                <div class="nav-content-inner">
                    <br/>
                    <h1>SMASH </h1>
                    <p>For Smash Reservation</p>
                    <p>If you don't have account, make it right now!</p>
                    <br/>
                    <a href="signup.html"><button class="greenButton">sign up</button></a>
                    <br>
                    <a href="signin.html"><button class="greenButton">sign in</button></a>
                    <br/>
                </div> <!-- class="nav-content-inner" -->
            </div> <!-- class="nav-content" -->
        </nav>
    <div> <!-- id="full" -->

    <section>
        <div id="all">
        <div class="front">
            <div class = "boxing">
            <img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>윤가영</h3>
                            <strong class="role">Web Designer</strong>
                            <p>Front 입니다</p>
            </div >
            <div class = "boxing">
            <img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>한건희</h3>
                            <strong class="role">Web Designer</strong>
                            <p>Front 입니다</p>
            </div>
        </div> <!-- class="front" -->
        <div class="back">
            <div class = "boxing">
            <img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>권혁진</h3>
                            <strong class="role">Coder</strong>
                            <p>Back 입니다.</p>
            </div>
            <div class = "boxing">
            <img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">
                            <h3>박현준</h3>
                            <strong class="role">Coder</strong>
                            <p>Back 입니다.</p>
            </div>
            <div class = "boxing">
            <img src="images/person_1.jpg" alt="Free HTML5 Templates by gettemplates.co">
                        <h3>배성훈</h3>
                            <strong class="role">Coder</strong>
                            <p>Back 입니다.</p>
            </div>
        </div> <!-- class="back" -->
        </div> <!-- id="all" -->
    </section>
    <footer class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 class="section-heading">Completely synergize resource taxing relationships</h2>
                    <p class="text-light">Professionally cultivate one-to-one customer service with robust ideas. Dynamically innovate resource-leveling customer service for state of the art customer service.</p>
                </div>
            </div>
        </div>
    </footer>


</body>
