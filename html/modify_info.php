<!DOCTYPE html>
<html>

  <body>

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/modify.css" rel="stylesheet">
    </head>

    <body>


        <header>
            <ul>
                <a href="index.php">Ordinary Colleage Students</a>

                <li><a href="reserve.php">Reservation</a></li>
                <li><a href="contactus.html">Contact us</a></li>

                <li><a href="reserve.html">Reservation</a></li>

                <!-- <li><a href="aboutus.html">About us</a></li> -->
                <li class="dropdown">
                    Log out
                    <div class="dropdown-content">
                        <a href="logout.php">Log out</a>
                    </div>

                </li>
            </ul>

        </header>
        <nav>
            <?php
            session_start();
            $db = new PDO("mysql:host=gs-db-instance1.cgkevqnkktap.ap-northeast-2.rds.amazonaws.com;port=3306;dbname=smash","smash","smash1219");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            // $db = new PDO("mysql:dbname=smash;host:localhost","root","root");		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            if($_SESSION["status"]=="log_in"){
                $user_id = $_SESSION["id"];
                if(isset($user_id)){
                 $query = "SELECT * FROM user_info WHERE user_id='$user_id'";
                 $rows = $db->query($query);
                 $valid = false;
                 $email = "";
                 foreach ($rows as $row) {
                   if(is_null($row)){
                     $valid = false;
                     break;
                   }
                   else{
                     $email = $row['user_email'];
                     ?>
                     <h1 id="heading">내 정보 변경하기</h1>
                     <div class="userinfo">
                       <ul>
                        <li>아이디 : <?=$row["user_id"]?></li>
                        <li>이메일 : <?=$row['user_email']?></li>
                       </ul>
                      </div>

                      <div class="modifier">
                        <ul>
                          <li><a href="modify_info.php?modify=pw"> 비밀번호 변경하기 </a></li>
                          <li><a href="modify_info.php?modify=em"> 이메일 변경하기</a></li>
                          <li><a href="modify_info.php?modify=up">학번/학과 등록하기</a></li>
                          <li><a href="mypage.php">돌아가기</a></li>
                          <style media="screen">
                            .modifier li{
                              list-style-type:none;
                            }
                            .modifier li a:visited, .modifier li a:link{
                              color: black;
                              text-decoration: none;
                              margin-top: 3em;
                            }
                            .modifier li a:hover{
                              color:white;
                            }
                          </style>
                        </ul>
                      </div>
                      <hr>
                      <br>
                    <?php
                     $valid = true;
                   }
                 }
                }
                else{
                  echo "접근할 수 없습니다.";
                }
            }
            ?>


            <?php
            if($_GET['modify']==='pw'){
              ?>



              <form class="pw_modify" action="modify_info.php?modify=pw&put=true" method="post">
              <div class = "modifyalien">
                <p>이전 비밀번호 : <input type="password" name="pre_pw" value=""></p>
                <p>새로운 비밀번호 : <input type="password" name="new_pw" value=""></p>

              <input type="submit" name="" value="변경하기">
              </div>
              </form>



            <?php
            $valid2 = false;
            $pre_pw = $_POST['pre_pw'];
            $new_pw = $_POST['new_pw'];

            if($_GET['put']==='true' && isset($pre_pw) && isset($new_pw)){
              $query2 = "SELECT * FROM user_info WHERE user_id='$user_id'";
              $pw_rows = $db->query($query2);
              // $pw_rows->bindParam(':user_id',$user_id,PDO::PARAM_INT);
              // $pw_rows->execute();
              foreach ($pw_rows as $pw_row) {
                if($pre_pw === $pw_row['user_pw']){
                  $valid2 = true;
                  break;
                }
              }
              if($valid2 === true){
                $query_update = "UPDATE user_info SET user_pw = '$new_pw' WHERE user_id='$user_id'";
                $db->query($query_update);
                echo "<script>alert('비밀번호가 변경되었습니다.');</script>";
              }
              else{
                echo "<script>alert('비밀번호가 일치하지 않습니다.');</script>";
              }
            }

            }
            else if($_GET['modify']==='em'){
              ?>
              <form class="em_modify" action="modify_info.php?modify=em&put=true" method="post">

                <p>이전 이메일:<?=$email?></p>
                <p>새로운 이메일:<input type="text" name="new_em" value=""></p>
                <input type="submit" name="" value="변경하기">
              </form>
              <?php
              $new_em = $_POST['new_em'];
              if($_GET['put']==='true'){
                $query3 = "UPDATE user_info SET user_email ='$new_em' WHERE user_id='$user_id'";
                $db->query($query3);
                echo "<script>alert('이메일이 변경되었습니다.');</script>";
              }
            }
            elseif ($_GET['modify']=='up') {
              ?>
              <form class="em_modify" action="modify_info.php?modify=up&put=true" method="post">

                <p>나의 학번:<input type="text" name="up_sid" value=""></p>
                <p>나의 학과:<input type="text" name="up_dep" value=""></p>
                <input type="submit" name="" value="업로드하기">
              </form>
              <?php
              if($_GET['put']=='true'){
                $sid = $_POST['up_sid'];
                $dep = $_POST['up_dep'];

                $u_query = "UPDATE user_info SET student_id = '$sid' WHERE user_id='$user_id'";
                $db->query($u_query);
                $u_query = "UPDATE user_info SET department = '$dep' WHERE user_id='$user_id'";
                $db->query($u_query);
                echo "<script>alert('등록되었습니다.');</script>";
              }

            }
            ?>

        </nav>


<br>
</body>
</html>
