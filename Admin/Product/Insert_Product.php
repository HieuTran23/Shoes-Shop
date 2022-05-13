<?php
require_once '../connectDB.php';

function a($fbrand){
    require_once '../connectDB.php';
    $brand = "";
    $conn = connectDB();
    $sql = "select * from brand";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $brand = $row['BraName'];
            if($fbrand == $brand) return $row['BraID'];
        }
    } else {
        echo "Error";
    } 
}
function c($fcate){
    require_once '../connectDB.php';
    $cate = "";
    $conn = connectDB();
    $sql = "select * from category";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $cate = $row['CateName'];
            if($fcate == $cate) return $row['CateId'];
        }
    } else {
        echo "Error";
    } 
}

$conn = connectDB();
if (isset($_POST['fid']) && 
    isset($_POST['fname']) && 
    isset($_POST['fbrand']) && 
    isset($_POST['fcolor']) && 
    isset($_POST['fnumber']) && 
    isset($_POST['fcate']) && 
    isset($_POST['fprice']) && 
    isset($_POST['fsize'])) {
        // get data from FORM
        $controlUpdate = $_POST['controlUpdate'];
        $id = $_POST['fid'];
        $fname = $_POST['fname'];
        //$fimage = $_POST['fimage'];
        $fbrand = $_POST['fbrand'];
        $brand = a($fbrand);
        $fcolor = $_POST['fcolor'];
        $fnumber = $_POST['fnumber'];
        $fcate = $_POST['fcate'];
        $cate = c($fcate);
        $fprice = $_POST['fprice'];
        $fsize = $_POST['fsize'];
        $isshowed = 0;
        if (isset($_POST['isshowed'])) {
            $isshowed = 1;
        }
        $fimage="";
        if(isset($_FILES['image'])){
            //echo var_dump($_FILES['image']);
            $errors= array();
            $fimage = $_FILES['image']['name'];
            $file_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($file_tmp,"../../Shoes/".$fimage);
        }
        $new_date=date('Y-m-d'); 
        if ($controlUpdate == 1) {
            $sql = "UPDATE `product` SET `ProCateID` ='$cate',`ProBarID` = '$brand',`ProImage` = '$fimage',`ProName` = '$fname', `ProColor` = '$fcolor', `ProPrice` = '$fprice', `Number` = '$fnumber', `Size` = '$fsize' WHERE `product`.`ProID` = 10";
        } else {
            $sql = "INSERT INTO `product` (`ProID`, `ProCateID`, `ProBarID`, `ProImage`, `ProName`, `ProColor`, `ProPrice`, `Number`, `IsShow`, `CreateDate`, `ModifyDate`, `Size`) VALUES ('$id', '$cate', '$brand', '$fimage', '$fname', '$fcolor', '$fprice', '$fnumber', '$isshowed', '$new_date', '$new_date', '$fsize')";
        }
        
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            header("Location:../Adminindex.php?Amid=Product");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
    }

mysqli_close($conn);


?>