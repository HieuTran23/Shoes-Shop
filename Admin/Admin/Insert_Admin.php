<?php
require_once '../connectDB.php';

$conn = connectDB();
if (isset($_POST['fAdminName']) && 
    isset($_POST['fPassword'])) {
        // get data from FORM
        $fAdminName = $_POST['fAdminName'];
        $fPassword = $_POST['fPassword'];
        $controlUpdate = $_POST['controlUpdate'];
        if ($controlUpdate == 1) {
            $sql = "UPDATE `admin` SET `Password`='$fPassword' WHERE AdminName='$fAdminName'";
        } else {
            $sql = "insert into admin(AdminName, Password) values('$fAdminName', '$fPassword')";
        }
        
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:../Adminindex.php?Amid=Admin");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>