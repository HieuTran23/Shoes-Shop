<?php
  session_start();

  require_once './connectDB.php';
  if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
  $conn = connectDB();
  $userName = $_SESSION['Email'];
  $sql = "SELECT * FROM `user` INNER JOIN  `customer`
          ON `user`.`Email` = `customer`.`Email`
          where `user`.Email = '$userName'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_assoc($result)) {
    $nameUser = $row['CusName'];
    $Address = $row['Address'];
    $Phone = $row['Phone'];
    $CusID = $row['CusID'];
  }
  mysqli_close($conn);
}
?>


<div class="SignInContainer">
    <h4 id="HomeHelp"><a href="Help.php" style="color:black;">Help</a></h4>
    <p> || </p>
    <h4 id="HomeSignIn">
    <?php if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
    echo $nameUser;}
    else echo "Sign In";
    ?>
    </h4>
</div> 

<?php

if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
$_SESSION['CusName'] =$nameUser;
$_SESSION['Address']  =$Address;
$_SESSION['Phone'] = $Phone;
$_SESSION['CusID'] = $CusID;
?>

<form action="CheckLogin.php" method="post">
  <div id="LoginDiv" class="LoginDiv">
    <div  class="SignInBox">
      <div class="header">
        <span>Dallato Shoes</span>
        Welcome to us Shops <br> You are a member of our shop.
      </div>
      <div class="Login">
        <button class="LoginBox" id="SignIn" name="SignIn">Log out</button>
      </div>
      </form>
      <?php
      ?>
      <div class="footer">
        Do you want to create new accout?. <span id="Createbtn">Create it</span> 
      </div>
    </div>
  </div>
</form>

<?php
}
else{


?>
<div id="LoginDiv" class="LoginDiv">
    <div  class="SignInBox">
      <div class="header">
        <span>Dallato Shoes</span>
        Sign in to access your Dallato <br>member perks.
      </div>
      <form action="CheckLogin.php" method="post">
      <div class="Login">
        <div id="EmailDiv">
          <input id="Email" name="Email" class="LoginBox" type="text" placeholder="Email address">
          <div id="EmailError"></div>
        </div>
        <div id="PasswordDiv">
          <input id="Password" name="Password" class="LoginBox" type="password" placeholder="Password">
          <div id="PasswordError"></div>
        </div>
        <button class="LoginBox" name="SignIn" id="SignIn">Sign In</button>
      </div>
      </form>
      <div class="footer">
         You dont have accout. <a href="Register.php">Create Accout</a>
      </div>
    </div>
</div>

<?php
}
?>