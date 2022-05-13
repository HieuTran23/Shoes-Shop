<?php
require_once '../connectDB.php';

$conn = connectDB();
if (isset($_GET['id'])) {
    
        $fEmail = $_GET['id'];
        
        $sql = "delete from user where Email = '$fEmail'";
        
        if (mysqli_query($conn, $sql)) {
            header("Location:../Adminindex.php?Amid=User");
            
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