let password = document.getElementById("passwordOriginal").value
let password2 = document.getElementById("passwordReType").value
let registerBtn = document.getElementById("registerBtn")


function validate(){
    if(password!=password2){
        alert("Password mus be the same")
        event.preventDefault()
    }
}