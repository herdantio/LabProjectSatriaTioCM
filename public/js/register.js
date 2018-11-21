
function validate(){

    let password = document.getElementById("passwordOriginal").value
    let password2 = document.getElementById("passwordReType").value
    let registerBtn = document.getElementById("registerBtn")

    if(password!=password2){
        alert("Password must be the same")
        event.preventDefault()
    }
}