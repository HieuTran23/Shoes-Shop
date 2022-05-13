var HomeSignIn = document.getElementById("HomeSignIn");
var LoginDiv = document.getElementById("LoginDiv");

HomeSignIn.addEventListener("click", function(){
    if(LoginDiv.style.display === 'block'){
        LoginDiv.style.display = 'none';
    }
    else{
            LoginDiv.style.display = 'block';
    }
})        

var Email = document.getElementById("Email");
var Password = document.getElementById("Password");
var SignIn = document.getElementById("SignIn");

SignIn.addEventListener("click",function Validate() {
    // validate email
    if (Email.value == ""){
        Email.style.border = "1px solid red";
        document.getElementById('EmailDiv').style.color = "red";
        document.getElementById('EmailError') . innerHTML = "Not empty";
    }
    else
    {
        Email.style.border = "1px solid black";
        document.getElementById('EmailDiv').style.color = "black";
        document.getElementById('EmailError') . innerHTML = "";
    }
        

    // validate password
    if (Password.value == "") {
        Password.style.border = "1px solid red";
        document.getElementById('PasswordDiv').style.color = "red";
        document.getElementById('PasswordError') . innerHTML = "Not empty";
    }
    else if(Password.value.length < 6){
        Password.style.border = "1px solid red";
        document.getElementById('PasswordDiv').style.color = "red";
        document.getElementById('PasswordError') . innerHTML = "Password is greater than 6 characters";
    }
    else{
        Password.style.border = "1px solid black";
        document.getElementById('PasswordDiv').style.color = "black";
        document.getElementById('PasswordError') . innerHTML = "";
    }
})

