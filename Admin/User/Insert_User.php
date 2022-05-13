<?php
require_once '../connectDB.php';

$conn = connectDB();
if (isset($_POST['fEmail']) && 
    isset($_POST['fPassword'])) {
        // get data from FORM
        $fEmail = $_POST['fEmail'];
        $fPassword = $_POST['fPassword'];
        $controlUpdate = $_POST['controlUpdate'];
        if ($controlUpdate == 1) {
            $sql = "UPDATE `user` SET `Password`='$fPassword' WHERE Email='$fEmail'";
        } else {
            $sql = "insert into user(Email, Password) values('$fEmail', '$fPassword')";
        }
        
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:../Adminindex.php?Amid=User");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>