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

    <script type="text/javascript" src="js/app.js"></script>



</head>

<body>
    <!-- <button type="button" id="fold" name="button">접기</button> -->
    <?php
        if(!isset($_SESSION["status"])) { $_SESSION["status"] = "log_out"; }
    ?>
    <div id="full">
<?php
        if($_SESSION["status"] == "log_out") {
?>
    <header>
    </header>
        <nav>
            <div class="nav-content">
                <div class="nav-content-inner">
                    <video autoplay loop id="video-background" muted plays-inline>
                        <source src="video/head3.mp4" type="video/mp4">
                    </video>
                    <div id="polina">
                        <div class="smash">
                            <h1>SMASH</h1>
                        <div class="sclock">
                            <p class = "clock"></p>
                        </div>
                        </div>
                        <div class="forsmash">
                            <p>For Smash Reservation</p>
                            <p>If you don't have account, make it right now!</a></br>
                            <div class="polinamargin">
                                <a href="signup.html"><button class="greenButton">sign up</button></a>
                                <a href="signin.html"><button class="greenButton">sign in</button></a>
                            </div>
                        <div>
                    </div>
                </div> <!-- class="nav-content-inner" -->
            </div> <!-- class="nav-content" -->
        </nav>
    <div> <!-- id="full" -->

    <section class="seccolor">
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
                    <h2 class="section-heading">Copyright</h2>
                    <p class="text-light">This web is Ordinary student's web</p>
                </div>
            </div>
        </div>
    </footer>
<?php
        } else {
?>
            <div class="dropdown-content">
                <a href="mypage.php">my page</a>
                        </div>


        <nav>
            <div class="nav-content">
                <div class="nav-content-inner">
                <video autoplay loop id="video-background" muted plays-inline>
                    <source src="video/head3.mp4" type="video/mp4">
                </video>

                    <div id="polina">
                        <div class="smash">
                            <h1>SMASH</h1>

                        <div class="sclock">
                            <p class = "clock"></p>
                        </div>
                        </div>
                        <div id="afterlogin">
                            <ul>
                                <li><a href="mypage.php">My Page</a></li>
                                <li><a href="reserve.html">Reservation</li>
                                <li><a href="logout.php">Log out</li>
                            </ul>
                        <div>
                    </div>
                </div> <!-- class="nav-content-inner" -->
            </div> <!-- class="nav-content" -->
        </nav>
    <div> <!-- id="full" -->

    <section class="seccolor">
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
                    <h2 class="section-heading">Copyright</h2>
                    <p class="text-light">This web is Ordinary student's web</p>
                </div>
            </div>
        </div>
    </footer>

    <?php
        }
?>


</body>
