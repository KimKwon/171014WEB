jQuery.noConflict();
var j$ = jQuery;

var date = new Date();
var year = date.getFullYear();
var month = new String(date.getMonth()+1);
var day = new String(date.getDate());

// 한자리수일 경우 0을 채워준다.
if(month.length == 1){
  month = "0" + month;
}
if(day.length == 1){
  day = "0" + day;
}

var today = year + "-" + month + "-" + day;
// [출처] 자바스크립트 오늘날짜 구하기 (YYYYMMDD)|작성자 히키코보라

$( function() {
  j$( "#datepicker" ).datepicker({
      changeMonth: false,
      changeYear: false,
      dateFormat: 'yy-mm-dd',
      minDate: 'today',
      maxDate: 'today'+7,
  });

});

window.onload = function() {

    $("datepicker").value= today;

    var date = $("datepicker").value;

    $("search").observe('click',function(){
      new Ajax.Request("show_time_table.php",{
    //     method: "POST",
        parameters: {date: date },
        onSuccess: show_time,
      });
    });

    j$('#myModalLabel').css("color","black");
    j$('.modal-body').css("color","black");
};



function show_time(ajax) {
    // alert(ajax.responseText);
    var Smash = ajax.responseXML.getElementsByTagName("Smash");
    var room = Smash[0].getElementsByTagName("room");
    alert( room.length);
    for(var i = 0; i < room.length; i++) { // 방 1개당 1번 도는 for문
        var td = document.createElement("td");
        var room_num = room[i].getAttribute("room"); // 방의 아이디를 가져오고
        var time = room[i].getElementsByTagName("time");
        for(var j = 9; j<=19; j++){
            
        }
    }
    // alert("이러고 바로 돌아감;");
}
