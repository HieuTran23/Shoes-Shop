
<?php
require_once './connectDB.php';
if(isset($_SESSION['Email']) || isset($_SESSION['Password'])){
    require_once './connectDB.php';
    if(isset($_SESSION['CusName'])){
        $CusName = $_SESSION['CusName'];
        $snoo=1;
    


        $conn = connectDB();
        $sql= "SELECT * FROM ((`product` INNER JOIN `ordersdetail` 
        ON `product`.`ProID` = `ordersdetail`.`ProID`) INNER JOIN `order`
        ON `order`.`OrdID` = `ordersdetail`.`OrdID`) INNER JOIN `customer`
        ON `customer`.`CusID` = `order`.`CusID` 
        WHERE `customer`.`CusName` = '$CusName';
                ";
        $result = mysqli_query($conn, $sql);


?>




<div class="cartBox" style="min-height: 300px;width:80%;margin:auto;margin-top:20vh;" >
<h1>
        History of your shopping
</h1>
    <h3 style="margin-left:30px;font-size:30px;font-weight:500;font-family:Comic Sans MS;color:rgb(75,175,175);">
        <?php
        echo $CusName;
        ?>
    </h3>
    
    <table width=100%>
        <thead>
            <tr>
                <th></th>
                <th>Name</th>
                <th>Image</th>
                <th>Color</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>OrderDate</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>

        

<?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
?>
            <tr>
                <td>
                </td>
                <td><?php echo $row['ProName']?></td>
                <td><img src="./Shoes/<?php echo $row['ProImage']?>" style="width:50%;" alt=""></td>
                <td><?php echo $row['ProColor']?></td>
                <td><?php echo $row['ProPrice']?></td>
                <td><?php echo $row['Quantity']?></td>
                <td><?php echo $row['OrderDate']?></td>
                <td><?php echo $row['OrderDetailCost']?></td>
            </tr>



<?php


            }
        }   
        else echo "0 results";

        
    } else {
        echo "0 results";
    }
?>


        </tbody>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
            
            </td>
        </tbody>
    </table>
               
</div>
<?php

}else{
    header("Location:index.php?id=error");
}
?>