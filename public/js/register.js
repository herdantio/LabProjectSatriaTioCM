let password = document.getElementById("passwordOriginal").value
let password2 = document.getElementById("passwordReType").value
let registerBtn = document.getElementById("registerBtn")

if(password!=password2){
    alert("Password mus be the same")
    registerBtn.disabled=true;
    event.preventDefault()
}else{
    registerBtn.disabled=false;
}