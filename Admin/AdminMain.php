<?php
require_once './connectDB.php';
if(isset($_GET['Amid'])){
    $Amid=$_GET['Amid'];
}else {
    $Amid="Category";
}

$conn = connectDB();
if($Amid=="Product"){
    $sql = "select *
                FROM (`product` INNER JOIN `category` 
                ON `product`.`ProCateID` = `category`.`CateId`)
                INNER JOIN `brand`
                ON `product`.`ProBarID` = `brand`.`BraID`
                ";
}elseif($Amid=="Order"){
    $sql = "SELECT * FROM ((((`product` INNER JOIN `ordersdetail` 
            ON `product`.`ProID` = `ordersdetail`.`ProID`) INNER JOIN `order`
            ON `order`.`OrdID` = `ordersdetail`.`OrdID`) INNER JOIN `customer`
            ON `customer`.`CusID` = `order`.`CusID`) INNER JOIN `brand`
            ON `product`.`ProBarID` = `brand`.`BraID`) INNER JOIN `category`
            ON `category`.`CateId` = `product`.`ProCateID`
                ";
}elseif($Amid=="Amin"){
    $sql = "select * from admin";
}elseif($Amid=="User"){
    $sql = "select * from user";
} else{
    $sql = "select * from $Amid";
}

$result = mysqli_query($conn, $sql);


?>

<div class="Menu">
    <ul >
        <li ><a href="./Adminindex.php?Amid=Category">Category</a></li>
        <li ><a href="./Adminindex.php?Amid=Brand">Brand</a></li>
        <li ><a href="./Adminindex.php?Amid=Product">Product</a></li>
        <li ><a href="./Adminindex.php?Amid=Order">Order</a></li>
        <li ><a href="./Adminindex.php?Amid=Admin">Amin</a></li>
        <li ><a href="./Adminindex.php?Amid=User">User</a></li>
    </ul>
</div>
<div class="Main1">
    <h1><?php echo $Amid ?> </h1>
    <p>This is function of adminstrator to insert, edit, delete one <?php echo $Amid?>.</p>
    
    <?php if($Amid=="Category"){ ?>
        <p><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php"> New <?php echo $Amid?></a></p>
    <table style="width:95%" border = "1">
        <tr>
            <th>Catgory Id</th>
            <th>Category Name</th> 
            <th>Modify Date</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
        
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr> 
                <td><?php echo $row['CateId']?> </td> 
                <td><?php echo $row['CateName']?></td>
                <td><?php echo $row['ModifyDate']?></td>
                <td><a href="./<?php echo $Amid?>/Delete_<?php echo $Amid?>.php?id=<?php echo $row['CateId']?>"onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                <td><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php?id=<?php echo $row['CateId']?>">Edit</a></td>
            </tr>
        <?php       }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <?php } elseif($Amid=="Brand"){?>
        <p><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php"> New <?php echo $Amid?></a></p>
        <table style="width:95%" border = "1">
        <tr>
            <th>Brand Id</th>
            <th>Brand Name</th> 
            <th>Modify Date</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
        
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr> 
                <td><?php echo $row['BraID']?> </td> 
                <td><?php echo $row['BraName']?></td>
                <td><?php echo $row['ModifyDate']?></td>
                <td><a href="./<?php echo $Amid?>/Delete_<?php echo $Amid?>.php?id=<?php echo $row['BraID']?>"onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                <td><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php?id=<?php echo $row['BraID']?>">Edit</a></td>
            </tr>
        <?php       }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <?php } elseif($Amid=="Product"){?>
        <p><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php"> New <?php echo $Amid?></a></p>
        <table style="width:95%" border = "1">
        <tr>
            <th>Product Id</th>
            <th>Product Name</th> 
            <th>Product Image</th> 
            <th>Product Brand</th> 
            <th>Product Color</th> 
            <th>Number</th> 
            <th>Category</th> 
            <th>Product Price</th> 
            <th>Size</th> 
            <th>Modify Date</th>
            <th></th>
            <th></th>
        </tr>
        <?php 
        
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr> 
                <td><?php echo $row['ProID']?> </td> 
                <td><?php echo $row['ProName']?></td>
                <td><img src="../Shoes./<?php echo $row['ProImage']?>"  width="100px"></td>
                <td><?php echo $row['BraName']?></td>
                <td width="100px"><?php echo $row['ProColor']?></td>
                <td><?php echo $row['Number']?></td>
                <td><?php echo $row['CateName']?></td>
                <td><?php echo $row['ProPrice']?></td>
                <td><?php echo $row['Size']?></td>
                <td><?php echo $row['ModifyDate']?></td>
                <td><a href="./<?php echo $Amid?>/Delete_<?php echo $Amid?>.php?id=<?php echo $row['ProID']?>"onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                <td><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php?id=<?php echo $row['ProID']?>">Edit</a></td>
            </tr>
        <?php       }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <?php } elseif($Amid=="Order"){?>
        <table style="width:95%" border = "1">
        <tr>
            <th>Order Id</th>
            <th>Customer Id</th>
            <th>Product Name</th> 
            <th>Product Image</th> 
            <th>Product Brand</th> 
            <th>Product Color</th> 
            <th>Category</th> 
            <th>Quantity</th> 
            <th>Cost</th> 
            <th>Order Date</th>
            <th></th>
        </tr>
        <?php 
        
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr> 
                <td><?php echo $row['OrdID']?> </td> 
                <td><?php echo $row['CusID']?></td>
                <td><?php echo $row['ProName']?></td>
                <td><img src="../Shoes./<?php echo $row['ProImage']?>"  width="100px"></td>
                <td><?php echo $row['BraName']?></td>
                <td width="100px"><?php echo $row['ProColor']?></td>
                <td><?php echo $row['CateName']?></td>
                <td><?php echo $row['Quantity']?></td>
                <td><?php echo $row['OrderDetailCost']?></td>
                <td><?php echo $row['OrderDate']?></td>
                <td><a href="./<?php echo $Amid?>/Delete_<?php echo $Amid?>.php?id=<?php echo $row['OrdID']?>"onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
            </tr>
        <?php       }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <?php } elseif($Amid=="Admin"){?>
        <p><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php"> New <?php echo $Amid?></a></p>
        <table style="width:95%" border = "1">
        <tr>
            <th>Name</th>
            <th>Password</th> 
            <th></th>
            <th></th>
        </tr>
        <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr> 
                <td><?php echo $row['AdminName']?> </td> 
                <td><?php echo $row['Password']?></td>
                <td><a href="./<?php echo $Amid?>/Delete_<?php echo $Amid?>.php?id=<?php echo $row['AdminName']?>"onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                <td><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php?id=<?php echo $row['AdminName']?>">Edit</a></td>
            </tr>
        <?php       }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <?php } elseif($Amid=="User"){?>
        <p><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php"> New <?php echo $Amid?></a></p>
        <table style="width:95%" border = "1">
        <tr>
            <th>Name</th>
            <th>Password</th> 
            <th></th>
            <th></th>
        </tr>
        <?php 
        
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
            <tr> 
                <td><?php echo $row['Email']?> </td> 
                <td><?php echo $row['Password']?></td>
                <td><a href="./<?php echo $Amid?>/Delete_<?php echo $Amid?>.php?id=<?php echo $row['Email']?>"onclick="return confirm('Are you sure you want to delete this?');">Delete</a></td>
                <td><a href="./<?php echo $Amid?>/Adding_<?php echo $Amid?>.php?id=<?php echo $row['Email']?>">Edit</a></td>
            </tr>
        <?php       }
            } else {
                echo "0 results";
            }
        ?>
    </table>
    <?php
    }
    mysqli_close($conn);
    ?>
</div>

