<?php
function findProID($productName){
    require_once 'connectDB.php';
    $proName = "";
    $conn = connectDB();
    $sql = "select * from product";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $proName = $row['ProName'];
            if($proName == $productName) return $row['ProID'];
        }
    } else {
        echo "Error";
    } 
}


session_start();
require_once './connectDB.php';
$conn = connectDB();
$u=0;
function FindProductSession($Session){
    require_once './connectDB.php';
    $conn = connectDB();
    $sql = "SELECT ProName FROM `product`";
    $result = mysqli_query($conn, $sql);
    $arrayProduct = array();
    $i=0;
    if (mysqli_num_rows($result) > 0) {
        foreach($Session as $products) {
            while($row = mysqli_fetch_assoc($result)) {
                if(isset($_SESSION[$row['ProName']])){
                    $arrayProduct[$i] = $_SESSION[$row['ProName']];
                    $i++;
                }
                else continue;
            }
        }
    }else {
        echo "Error";
    }
    return $arrayProduct;
}



$Session = FindProductSession($_SESSION);
foreach($Session as $products){
    $productName="";
    $quantity="";

    foreach($products as $key => $value){
        if($key==0){
            $productName=$value;
        }elseif($key==5){
            if($value==null){
                $value=1;
            }
            $quantity = $value;
        }


    }

    if(isset($_SESSION['OrdID'])){
        echo "Success";
        $OrdID = $_SESSION['OrdID'];
        $ProID = findProID($productName);
        $Bill = $_SESSION['arrayBill'];
        $sql = "insert into `ordersdetail`(`OrdID`,`ProID`,`Quantity`,`OrderDetailCost`) values ('$OrdID','$ProID','$quantity','$Bill[$u]')";
        if (mysqli_query($conn, $sql)) {
            //echo "New record created successfully";
            echo "Success";
            $_SESSION['OrdID']=$OrdID;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        $u++;
    }
    else{
        echo "Error";
    }



    echo $productName . $quantity;
}


    

header("Location:Cart.php");

mysqli_close($conn);

?>