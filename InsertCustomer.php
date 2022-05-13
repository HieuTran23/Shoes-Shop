<?php
session_start();
require_once './connectDB.php';
$conn = connectDB();

function findMaxIdCus(){
    require_once './connectDB.php';

    $conn = connectDB();
    $sql = "SELECT max(`CusID`) FROM `customer`";
    $result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)){
        if($data['max(`CusID`)']==NULL){
            return $data['max(`CusID`)'] =1;
        }
        else return $data['max(`CusID`)'];
    }
}


if((isset($_POST['CusName'])) &&
(isset($_POST['Email'])) &&
(isset($_POST['Phone'])) &&
(isset($_POST['Address']))){
    $CusName = $_POST['CusName'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $CusID = findMaxIdCus();
    $CusID++;
    echo $CusID;
    $sql = "insert into customer(CusID,CusName,Email,Phone,Address) values ('$CusID','$CusName','$Email','$Phone','$Address')";
    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        echo "Success";
        $_SESSION['CusID']=$CusID;
        $_SESSION['CusName']=$CusName;
        $_SESSION['Email']=$Email;
        $_SESSION['Phone']=$Phone;
        $_SESSION['Address']=$Address;
        header("Location:CartView.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{
    header("Location:InserOrder.php");
}

mysqli_close($conn);

?>

