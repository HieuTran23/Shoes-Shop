<?php
require_once '../connectDB.php';

$conn = connectDB();
if (isset($_GET['id'])) {
    
        $fAdminName = $_GET['id'];
        
        $sql = "delete from admin where AdminName = '$fAdminName'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location:../Adminindex.php?Amid=Admin");
            
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            exit;
        }
        
        
    }
else{
    echo "Error";
}
mysqli_close($conn);
?>