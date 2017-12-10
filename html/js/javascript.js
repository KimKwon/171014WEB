"use strict";

Ajax.Responders.register({
    onFailure: ajaxFailure,
    onException: ajaxFailure
});

function ajaxFailure(ajax, exception) {
    alert( ajax.responseText );
}

window.onload = function() {
    var rnums = $$("li.rnum");
    rnums.invoke('observe','click',function(){
      new Ajax.Request("show_time_table.php",{
        method: "GET",
        parameters: {room_number: this.id},
        onSuccess: show_time,
        onFailure: ajaxFailure
      });
    });

    // for(var i = 0; i < rnums.length; i++) {
    //     rnums[i].onclick = function() { new Ajax.Request("show_time_table.php", {
    //         method: "get",
    //         parameters: {room_number: i},
    //         onSuccess: show_time,
    //         onFailure: ajaxFailure
    //         });
    //     };
    // } 이거로 하면 무조건 i가 9가 보내짐 - 이유 아는 사람?

    // rnums[0].onclick = function() { new Ajax.Request("show_time_table.php", {
    //     method: "get",
    //     parameters: {room_number: 0},
    //     onSuccess: show_time,
    //     onFailure: ajaxFailure
    //     });
    // };
    // rnums[1].onclick = function() { new Ajax.Request("show_time_table.php", {
    //     method: "get",
    //     parameters: {room_number: 1},
    //     onSuccess: show_time,
    //     onFailure: ajaxFailure
    //     });
    // };
    // rnums[2].onclick = function() { new Ajax.Request("show_time_table.php", {
    //     method: "get",
    //     parameters: {room_number: 2},
    //     onSuccess: show_time,
    //     onFailure: ajaxFailure
    //     });
    // };
    // rnums[3].onclick = function() { new Ajax.Request("show_time_table.php", {
    //     method: "get",
    //     parameters: {room_number: 3},
    //     onSuccess: show_time,
    //     onFailure: ajaxFailure
    //     });
    // };


    // rnums[0].onclick = function() { new Ajax.Request("show_time_table.php", {
    //     method: "get",
    //     parameters: {room_number: 0},
    //     onSuccess: show_time2,
    //     onFailure: ajaxFailure
    //     });
    // };
};

// function show_time_table(room_no) {
//     new Ajax.Request("show_time_table.php", {
//         method: "get",
//         parameters: {room_number: room_no},
//         onSuccess: show_time
//     });
// }

function show_time(ajax) {
    // alert(ajax.responseText);
    var times = ajax.responseXML.getElementsByTagName("times");
    var time = times[0].getElementsByTagName("time");
    // var li = document.createElement("li");
    $("tr").innerHTML = "<td>#"+times[0].getAttribute("room")+"</td>";
    for(var i = 0; i < time.length; i++) {
        var td = document.createElement("td");
        // td.innerHTML = data.times[i].status + "!";
        var t = time[i].getAttribute("t");
        var st = time[i].getAttribute("st");
        if(st =="possible"){
            td.innerHTML = "P";
        }
        else{
            td.innerHTML = "I";
        }
        $(tr).appendChild(td);
    }
    var td = $$("td");
    for(var i=0;i<td.length;i++){
        td[i].addClassName("select");
    }
    // alert("이러고 바로 돌아감;");
}

// function show_time2(ajax) {
//     // alert(ajax.responseText);
//     var times = ajax.responseXML.getElementsByTagName("times");
//     var time = times[0].getElementsByTagName("time");
//     $("tr").innerHTML = "<td>TIME</td>";
//     for(var i = 0; i < time.length; i++) {
//         var td = document.createElement("td");
//         // td.innerHTML = data.times[i].status + "!";
//         var t = time[i].getAttribute("t");
//         var st = time[i].getAttribute("st");
//         if(st =="possible"){
//             td.innerHTML = "P";
//         }
//         else{
//             td.innerHTML = "I";
//         }
//         tr.appendChild(td);
//     }
//     var td = $$("td");
//     for(var i=0;i<td.length;i++){
//         td[i].addClassName("select2");
//     }
//     // alert("이러고 바로 돌아감;");
// }
