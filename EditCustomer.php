<?php
session_start();

$isUpdated = 0;
if(isset($_SESSION['CusName'])  &&
    isset($_SESSION['Phone'])  &&
    isset($_SESSION['Address']) 
    ){
        $Email = $_SESSION['Email'];
        $CusName = $_SESSION['CusName'];
        $Phone = $_SESSION['Phone'];
        $Address = $_SESSION['Address'];
        $CusID = $_SESSION['CusID'];
        $isUpdated = 1;

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
    <h1 style="text-align: center;">Edit your information</h1>
    <form action="InsertCustomer.php" method="post">
        <div class="Login">
                <input id="Email" name="Email" class="LoginBox" type="text" value="<?php echo $Email?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="Name">
                <input id="CusName" name="CusName" class="LoginBox" type="text" placeholder="<?php echo $CusName?>">
                <input id="Phone" name="Phone" class="LoginBox" type="text" placeholder="<?php echo $Phone?>">
                <input id="Address" name="Address" class="LoginBox" type="text" placeholder="<?php echo $Address?>">
            <button class="LoginBox" id="SubmitOrder" name="SubmitOrder" style="cursor:pointer;">Submit</button>
        </div>
        
    </form>
    <a href="Cart.php" class="LoginBox" style="color:black;border:2px solid black;border-radius:3px;" > Back Cart Site</a>
    </div>


</body>
</html>

