<?php
require_once './connectDB.php';

function findMaxIdCus(){
    require_once './connectDB.php';

    $conn = connectDB();
    $sql = "SELECT max(`CusID`) FROM `customer`";
    $result = mysqli_query($conn, $sql);
    while($data = mysqli_fetch_assoc($result)){
        if($data['max(`CusID`)']==NULL){
            return $data['max(`CusID`)'] =0;
        }
        else return $data['max(`CusID`)'];
    }
}

$conn = connectDB();
if(isset($_POST['Create1'])) {
        // get data from FORM
        $email = $_POST['Email1'];
        $password = $_POST['Password1'];
        $passwordConfirm = $_POST['PasswordConfirm1'];
        $address = $_POST['Address1'];
        $phone = $_POST['Phone1'];
        $name = $_POST['Name1'];
        $CusID = findMaxIdCus();
        $CusID++;

        if($email == "" && $password =="" && $passwordConfirm == "" && $address =="" && $phone=="" && $name==""){
            header("Location:./Register.php?id=1");

        }
        elseif(strlen($passwordConfirm)<=4){
            header("Location:./Register.php?id=2");
        }
        elseif($passwordConfirm !=$password){ 
            header("Location:./Register.php?id=3");
        }
        else
        {
            $sql = "insert into `user`(`Email`, `Password`) values('$email', '$password')";
            $sql1 = "insert into `customer`(`CusID`,`Address`, `Phone`, `CusName`, `Email`) values('$CusID','$address', '$phone', '$name','$email')";
            mysqli_query($conn, $sql);
        }
        if (mysqli_query($conn, $sql1)) {
            //echo "New record created successfully";
            header("Location:./index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
      
        
        
    }

mysqli_close($conn);


?>
