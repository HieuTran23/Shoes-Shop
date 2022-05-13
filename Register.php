<?php
if(isset($_GET['id'])){
    $id=$_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <div class="boxCreateAccount" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);width: 400px;margin:auto;border-radius:15px;margin-top:30px;padding:50px 0 50px 0;">
    <h1 style="text-align: center;">Create Account</h1>
    <form action="AddingAccount.php" method="post">
        <div class="Login">
            <div>
                <?php
                if(isset($_GET['id'])){
                    if($id==1){
                        echo "<p style=\"font-size:23px;color:red;\">Not empty information</p>";
                    }elseif($id==2){
                        echo    "<p style=\"font-size:18px;color:red;\">Password more than 4 character</p>";
                    }
                    elseif($id==3){
                        echo "<p style=\"font-size:18px;color:red;\">Password different Password</p>";
                    }
                }
                ?>
            </div>
            <div id="EmailDiv1">
                <input id="Email1" name="Email1" class="LoginBox" type="text" placeholder="Email address">
                <div id="EmailError1"></div>
            </div>
            <div id="PasswordDiv1">
                <input id="Password1" name="Password1" class="LoginBox" type="password" placeholder="Password">
                <div id="PasswordError1"></div>
            </div>
            <div id="PasswordConfirmDiv">
                <input id="PasswordConfirm1" name="PasswordConfirm1" class="LoginBox" type="password" placeholder="Password">
                <div id="PasswordConfirmError1"></div>
            </div>
            <div id="AddressDiv1">
                <input id="Address1" name="Address1" class="LoginBox" type="text" placeholder="Address">
                <div id="AddressError1"></div>
            </div>
            <div id="PhoneDiv1">
                <input id="Phone1" name="Phone1" class="LoginBox" type="text" placeholder="Phone">
                <div id="PhoneError1"></div>
            </div>
            <div id="NameDiv1">
                <input id="Name1" name="Name1" class="LoginBox" type="text" placeholder="Your name">
                <div id="NameError1"></div>
            </div>
            
            <button class="LoginBox" id="Create1" name="Create1">Create</button>
        </div>
    </form>
    </div>


</body>
</html>

