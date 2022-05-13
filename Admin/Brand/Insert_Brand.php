<?php
require_once '../connectDB.php';

$conn = connectDB();
if (isset($_POST['fid']) && 
    isset($_POST['fname'])) {
        // get data from FORM
        $controlUpdate = $_POST['controlUpdate'];
        $id = $_POST['fid'];
        $fname = $_POST['fname'];
        $isshowed = 0;
        if (isset($_POST['isshowed'])) {
            $isshowed = 1;
        }

        $new_date=date('Y-m-d'); 
        if ($controlUpdate == 1) {
            $sql = "UPDATE brand SET BraName='$fname', IsShow=$isshowed, ModifyDate='$new_date' WHERE BraID=$id";
        } else {
            $sql = "insert into brand(BraID, BraName, IsShow, CreateDate, ModifyDate) values($id, '$fname', $isshowed, '$new_date', '$new_date')";
        }
        
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:../Adminindex.php?Amid=Brand");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>