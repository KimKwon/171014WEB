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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.js"></script>

    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.css">

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.js"></script>



    <script src="js/reserve.js" type="text/javascript"></script>
    <script type="text/javascript">

      jQuery.noConflict();
      var j$ = jQuery;

    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/prototype/1.7.1.0/prototype.js" type="text/javascript"></script>

    <!-- <script src="js/reserve.js" type="text/javascript"></script> -->

</head>

<body>


    <header>
        <ul class="ulmargin">
            <a href="index.php">Ordinary Colleage Students</a>
            <li><a href="mypage.php">My Page</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>

    </header>
    <nav>
        <div class="nav-content">
            <div class="nav-content-inner">
                <div class="timetable"  >
                    <table id="table"  class="table table-striped">
                        <tr >
                            <th>TIME</th><th>9</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th>
                        </tr>
                        <tr class="room_time" id="room0">
                        </tr>
                        <tr class="room_time" id="room1">
                        </tr>
                        <tr class="room_time" id="room2">
                        </tr>
                        <tr class="room_time" id="room3">
                        </tr>
                        <tr class="room_time" id="room4">
                        </tr>
                        <tr class="room_time" id="room5">
                        </tr>
                        <tr class="room_time" id="room6">
                        </tr>
                        <tr class="room_time" id="room7">
                        </tr>
                        <tr class="room_time" id="room8">
                        </tr>
                    </table>


                <div>
                    <input type="text" id="datepicker">
                    <button id="search"> 조회 </button>
                </div>
            </div>
        <br>
        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal2Label" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal3Label">예약 정보 출력</h4>
              </div>
              <div class="modal-body">
                <label class="form-control-static">대표자 이메일: </label><input class="form-control" id="disabledInput" name='1' type="text" placeholder=""  readonly>
                <br>
                <label class="form-control-static">예약 목적: </label><input class="form-control" id="disabledInput" name='2' type="text" placeholder=""  readonly>
                <br>
                <label class="form-control-static">예약 인원: </label><input class="form-control" id="disabledInput" name='3' type="text" placeholder=""  readonly>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">닫기</button>
              </div>
            </div>
          </div>
        </div>


            <!-- Button trigger modal -->
        <button type="button" id="reser"class="btn btn-primary btn-lg" data-toggle="modal">
          예약하기
        </button>
        <div class="example">
            <p>Reserved =  </p><div class="example_box" id="brown"></div> <p>Chosen = </p><div class="example_box" id="green"></div> <p>You Can Choose = </p><div class="example_box" id="ygreen"></div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">예약 정보 입력</h4>
              </div>
              <div class="modal-body">
                <form action="register_info.php" method='post'>
                <!-- <?php $date = $_GET["date"]?> -->
                <div class="form-group">
                    <label class="control-label">사용 날짜:</label>
                    <input type="date" name='date' class="form-control" id="form_date" placeholder=""  readonly >
                    <br>
                    <label class="control-label">방 번호:</label>
                    <br>
                    <input class="form-control" id="disabledInput" name='reserve_room_no' type="text" placeholder=""  readonly>
                    <br>
                    <label class="control-label">사용 시간:</label>
                    <br>
                    <span><input class="form-control" id="disabledInput" name='reserve_time' type="text" placeholder="" value='' readonly></span>
                    <h4>~</h4>
                    <span><input class="form-control" id="disabledInput" name='reserve_end' type="text" placeholder="" value='' readonly></span>

                    <!-- <p class='form-control-static'><span class='form-control-static' id='reserve_time' name='reserve_time'></span>~<span class='form-control-static' id='reserve_end'></span></p> -->
                          <!-- <input type="text" name="reserve_time" class="form-control" id="reserve_time" > -->



                    <!-- </select> -->
                    <br>
                    <label class="control-label">사용 목적:</label><br>
                    <input type="text" name='form_purpose' class="form-control" id="form_purpose">
                    <br>
                    <label class="control-label">사용 인원:</label><br>
                    <select class="form-control" name="form_population" id='form_population'>
                      <optgroup label="사용 인원 선택">
                        <option value="1">1명</option>
                        <option value="2">2명</option>
                        <option value="3">3명</option>
                        <option value="4">4명</option>
                        <option value="5">5명</option>
                        <option value="6">6명 이상</option>
                      </optgroup>
                    </select>
                    <!-- <textarea name='population' class="form-control" id="form_population"></textarea> -->
                    <input type="hidden" name="reserve_period" id="reserve_period">
                  </div>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
                <button type="submit" id='hi' class="btn btn-primary">확인</button>
              </div>
              </form>
            </div>
          </div>
        </div>

            <!-- <button id="submit">제출하기</button> -->

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
