let psw = document.getElementById("password");
let msg1 = document.getElementById("err1");

if (psw.value.length < 6) document.getElementById("load").disabled = 1;

psw.onkeyup = function() {
    if (psw.value.length < 6 && psw.value.length > 0) msg1.innerHTML = "Enter at least 6 symbols";
    else msg1.innerHTML = "";
    if (psw.value.length > 5) {
        document.getElementById("load").disabled = 0;
        msg1.innerHTML = "";
    } else document.getElementById("load").disabled = 1;
}