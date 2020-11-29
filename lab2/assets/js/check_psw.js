let psw1 = document.getElementById("psw_1");
let psw2 = document.getElementById("psw_2");
let msg1 = document.getElementById("err1");
let msg2 = document.getElementById("err2");

psw1.onkeyup = function() {
    if (psw1.value.length < 6 && psw1.value.length > 0) msg1.innerHTML = "Enter at least 6 symbols";
    else msg1.innerHTML = "";
    if (psw1.value != psw2.value && psw2.value.length > 0) msg2.innerHTML = "Passwords don`t match";
    if (psw1.value == psw2.value && psw1.value.length > 5) {
        document.getElementById("button").disabled = 0;
        msg2.innerHTML = "";
    } else document.getElementById("button").disabled = 1;
}

psw2.onkeyup = function() {
    if (psw1.value == psw2.value || psw2.value.length == 0) msg2.innerHTML = "";
    else msg2.innerHTML = "Passwords don`t match";
    if (psw1.value == psw2.value && psw1.value.length > 5) document.getElementById("button").disabled = 0;
    else document.getElementById("button").disabled = 1;
}