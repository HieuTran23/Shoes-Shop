<?php
session_start();
require_once './connectDB.php';

$conn = connectDB();

if(isset($_POST['SignIn'])){
    if(isset($_POST['Email']) && isset($_POST['Password'])){
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        
        $sql = "select * from user
            where Email = '$email'
            ";


        $result = mysqli_query($conn, $sql); 
        while($data = mysqli_fetch_assoc($result)) {
            if($data['Email'] =="$email" && $data['Password']=="$password"){
                $_SESSION['Email'] = "$email";
                $_SESSION['Password'] = "$password";
                
            }
            else{
                echo "You don't have your accout or enter wrong";
            }
        }
    } else{
        unset($_SESSION['Email']);
        unset($_SESSION['Password']);
        session_destroy();
    }
}

header("Location:index.php");
?>