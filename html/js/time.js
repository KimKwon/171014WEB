window.onload = function(){
  $('fold').observe("click",hideSwitch);
}

j$(document).ready(
  function(){
    setInterval("printTime()",1000);
  }
)

var isHide = true;

function printTime(){
  if(isHide === false){
    j$.ajax({
      type: "GET",
      url: "./time.php",

      success : function(data){
        data = "SMASH ZZIM 의 서버시간은 " + data + " 입니다"
        j$('#clocker').html(data);
        j$('.clock').css({"font-size":"3em","text-align":"center"});
      }
    }).done(function(){console.log("done")})
    .fail(function(){console.log("fail")})
  }
}

function hideSwitch(){
  if(isHide === true){
    $('clocker').show();
    isHide = false;
    $('fold').innerHTML = '접기';
  }
  else{
    $('clocker').hide();
    isHide = true;
    $('fold').innerHTML = '펴기';
  }
}
