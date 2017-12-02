"use strict";

Ajax.Responders.register({
    onFailure: ajaxFailure,
    onException: ajaxFailure
});

function ajaxFailure(ajax, exception) {
    alert("Error making Ajax request:" +
          "\n\nServer status:\n" + ajax.status + " " + ajax.statusText +
          "\n\nServer response text:\n" + ajax.responseText);
    if (exception) {
        throw exception;
    }
}

window.onload = function() {
    var rnums = $$("li.rnum");
    for(var i = 0; i < rnums.length; i++) {
        rnums[i].onclick = function() { show_time_table(i); }
    }
}

function show_time_table(room_no) {
    new Ajax.Request("show_time_table.php", {
        method: "get",
        parameters: {room_number: room_no},
        onSuccess: show_time
    })
}

function show_time(ajax) {
    // alert(ajax.responseText);
    var data = JSON.parse(ajax.responseText);
    $("tr").innerHTML = "<td>TIME</td>";
    for(var i = 0; i < data.times.length; i++) {
        var td = document.createElement("td");
        // td.innerHTML = data.times[i].status + "!";
        if(data.times[i].status =="possible"){
            td.innerHTML = [i];
        }
        tr.appendChild(td);
    }
    var td = $$("td");
    for(var i=0;i<td.length;i++){
        td[i].addClassName("select");
    }
    // alert("이러고 바로 돌아감;");
}
