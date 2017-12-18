jQuery.noConflict();
var j$ = jQuery;

var date = new Date();
var year = date.getFullYear();
var month = new String(date.getMonth()+1);
var day = new String(date.getDate());
var want_time = new Array();
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

    new Ajax.Request("show_time_table.php",{
  //     method: "POST",
      parameters: {date: date },
      onSuccess: show_time,
    });

    $("search").observe('click',function(){

            // alert(want_time.length);
        for(var p=0;p<want_time.length;p++){
            j$("td")[ want_time[p]].removeClassName("choose");
        }
        want_time=[];//날짜가 바뀌면 기존에 저장된 시간들 날려주기

        var date = $("datepicker").value;
        new Ajax.Request("show_time_table.php",{
    //     method: "POST",
        parameters: {date: date },
        onSuccess: show_time,
      });
    });

    $("reser").observe('click',function(){
        var date = $("datepicker").value;
        $("form_date").value = date ;
        // $('#disabledInput').attr('placeholder',parseInt(want_time[0]/12).toString());
        $$('#disabledInput[name=\'reserve_room_no\']')[0].value = parseInt(want_time[0]/12).toString();


        // j$('span input#disabledInput').attr('placeholder',(want_time[0]%12)+8 +" : 00");
        $$('span input#disabledInput')[0].value = (want_time[0]%12)+8 +" : 00";
        // j$('span input#disabledInput[name=\'reserve_end\']').attr('placeholder',(want_time[want_time.length-1]%12)+9 +" : 00");
        $$('span input#disabledInput[name=\'reserve_end\']')[0].value = (want_time[want_time.length-1]%12)+9 +" : 00";

        $("reserve_period").value = want_time.length;

    });

    j$('#reser').on("click",function(){
      if($$(".choose").length<=0){
        alert("방을 선택해주세요.");
      }
      else{
        j$('#myModal').modal();
      }

    })
    j$('#myModalLabel').css("color","black");
    j$('.modal-body').css("color","black");

};



$(document).on("click","td",function(){
      var index = j$("td").index(this)
        if(index%12 != 0 && !(j$("td")[index].hasClassName("reserve")) ){
            if(want_time.length == 0){
                want_time.push( index );
                this.addClassName("choose");
            }
            else{
                if(want_time.indexOf(index) != -1){
                    if( want_time.indexOf(index) == 0 || want_time.indexOf(index) == want_time.length-1){
                        want_time.splice(want_time.indexOf(index),1);
                        this.removeClassName("choose");
                    }
                    else{
                        // alert(want_time.length);
                        for(var p=0;p<want_time.length;p++){
                            if ( want_time[p] != index ) {
                                j$("td")[ want_time[p]].removeClassName("choose");
                            }
                        }
                        want_time=[];
                        want_time.push(index);
                    }
                }
                else{
                    if( parseInt((index)/12) == parseInt((want_time[want_time.length-1])/12) ){
                        //연속된 시간인가
                        if( (want_time[0]-index == 1 || index - want_time[want_time.length-1] == 1) ){
                            //같은 방인가
                            if( want_time[0]>index ){
                                this.addClassName("choose");
                                want_time.unshift(index);
                            }// 맨앞쪽을 선택했을 시
                            else{
                                this.addClassName("choose");
                                want_time.push(index);
                            }// 뒷 쪽을 선택했을시
                        }
                        else{
                            alert("연속되지 않은 시간은 선택 하실 수 없습니다.");
                        }
                    }
                    else{
                        alert("한번에 두 방을 사용 하실 수 없습니다.")
                    }
                }
            }
        }
 });



function show_time(ajax) {
    // alert(ajax.responseText);
    var Smash = ajax.responseXML.getElementsByTagName("Smash");
    var room = Smash[0].getElementsByTagName("room");
    // alert( room.length);
    for(var i = 0; i < room.length; i++) { // 방 1개당 1번 도는 for문
        var room_num = room[i].getAttribute("room"); // 방의 아이디를 가져오고
        var time = room[i].getElementsByTagName("time");
        var td = document.createElement("td");
        $(room_num).innerHTML="";
        td.innerHTML = room_num;
        $(room_num).appendChild(td);
        for(var j = 9; j<=19; j++){
            var td = document.createElement("td");
            td.style.width = 45+"px";
            td.style.borderLeft = "solid 2px white";
            for(var k=0;k<time.length;k++){
                if( time[k].firstChild.nodeValue == j){
                    td.addClassName("reserve");
                }
            }
            $(room_num).appendChild(td);
        }
    }
    j$('.reserve').on("click",function(events){
      var a = event.target;
      infoLoader(a);
    })
    // alert("이러고 바로 돌아감;");
}
function infoLoader(elem){
  var count=0;
  var arr = [];
  var date = $("datepicker").value;
  var tmp = elem.previousSibling;

  while(tmp = tmp.previousSibling){
    arr.push(tmp);
    count++;
  }
  if(arr.length<=0){
    var room = elem.previousSibling.innerHTML;
  }
  else{
      var room = arr[arr.length-1].innerHTML;
  }

  new Ajax.Request("get_reserve_info.php",{
    method: "post",
    parameters: {room_no:room, room_time:(9+count), date:date},
    onSuccess: showInfo
  })
}

function showInfo(ajax){
  var a = ajax.responseText;
  a = JSON.parse(a);
  $$('#disabledInput[name=\'1\']')[0].value = a.us_em;
  $$('#disabledInput[name=\'2\']')[0].value = a.purpose;
  $$('#disabledInput[name=\'3\']')[0].value = a.population;
  j$('#myModal3Label').css("color","black");
  j$('#myModal3').modal();
}
