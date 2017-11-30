 "use strict";


var numofcheck =0;

window.onload = function() {
    
    var time = $$("td:not(:first-child)");
    for(var i=0;i<time.length; i++){
        time[i].observe("click",select);
    }
};

function select(event){
    if(event.target.hasClassName("select")){
        event.target.removeClassName("select");
        numofcheck = numofcheck - 1;
    }
    else{
        if(numofcheck >= 2){
            alert("하루에 두시간 이상 예약 하실 수 없으십니다.");
        }
        else{
                event.target.addClassName("select");
             numofcheck = numofcheck + 1;
        }
    }
}