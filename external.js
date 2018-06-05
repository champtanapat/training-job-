localStorage.setItem("userRR", $("#userReg_").val());
window.localStorage = "success.html";

function showLogin() {
    var firstname = document.getElementById("firstname_").value;
    var lastname = document.getElementById("lastname_").value;
    var email = document.getElementById("email_").value;
    var userReg = document.getElementById("userReg_").value;
     username = document.getElementById("userReg_").value;
    var passwordReg = document.getElementById("passwordReg_").value;

    var confirm = document.getElementById("confirm_").value;
    console.log("dfd");
    alert("pass word not mathce ");
    if(passwordReg != confirm) 
    {
        alert("pass word not mathce ");
    }

function checkValueISNull(allArry) {
    for (var i = 0; i < allArry.length; i++) {
        if (isNaN(allArry[i]) || allArry[i]=="") {
            return false;
        }
        
    }
    return true;
}
/*
document.getElementById("showUser").innerHTML = username;

alert(username);*/