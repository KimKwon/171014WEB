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
    for(var i = 0; i < rnums.length; i++) {
        rnums[i].onclick = function() { new Ajax.Request("show_time_table.php", {
            method: "get",
            parameters: {room_number: i},
            onSuccess: show_time,
            onFailure: ajaxFailure
            });
        };
    }

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
    $("tr").innerHTML = "<td>TIME</td>";
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
        tr.appendChild(td);
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
