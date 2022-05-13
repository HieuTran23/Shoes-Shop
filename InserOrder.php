<?php
session_start();

require_once './connectDB.php';
$conn = connectDB();

function findMaxIdOrder(){
    require_once './connectDB.php';

    $conn = connectDB();
    $sql = "SELECT max(`OrdID`) FROM `order`";
    $result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)){
        if($data['max(`OrdID`)']==NULL){
            return $data['max(`OrdID`)'] =1;
        }
        else return $data['max(`OrdID`)'];
    }
}


if(isset($_SESSION['CusID'])){
    echo "Success";
    $OrdID = findMaxIdOrder();
    $CusID = $_SESSION['CusID'];
    $OrdID++;
    $new_date=date('Y-m-d'); 
    $OrderCostTotal = $_SESSION['total'];
    $sql = "insert into `order`(`OrdID`,`CusID`,`OrderDate`,`OrderCostTotal`) values ('$OrdID','$CusID','$new_date','$OrderCostTotal')";
    if (mysqli_query($conn, $sql)) {
        //echo "New record created successfully";
        echo "Success";
        $_SESSION['OrdID']=$OrdID;
        header("Location:InserOrderDetails.php");

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
else{
    header("Location:Cart.php?id=Error");
}

mysqli_close($conn);

?>

