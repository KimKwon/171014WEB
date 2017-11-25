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

</head>

<body>

    <div id="full">
        <header>
            <ul>
                <a href="index.php">Ordinary Colleage Students</a>
                <li><a href="reserve.php">Reservation</a></li>
                <li><a href="contactus.html">Contact us</a></li>
                <li><a href="#all">About us</a></li>
                    <!-- 천천히 내리는거 추가 해야함 -->
                <li class="dropdown">
                    sign up
                    <div class="dropdown-content">
                        <a href="signup.html">sign up</a>
                        <a href="signin.html">sign in</a>
                    </div>

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

                    <?php $signed = $_GET["signed"];?>
                        <?if ($signed != true) {?>
                            <a href="signup.html"><button class="greenButton">sign up</button></a>
                        <?}
                        else {?>
                            <a href="signin.html"><button class="greenButton">sign in</button></a>
                        <?}?>




                    <br/>
                </div>
            </div>
        </nav>
    <div>
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
        </div>
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
        </div>
        </div>
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
