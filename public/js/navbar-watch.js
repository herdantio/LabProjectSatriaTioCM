var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
    // var t = d.toLocaleTimeString();
    var t = d.toLocaleString('en-GB')
    document.getElementById("navbar-clock").innerHTML = t;
}