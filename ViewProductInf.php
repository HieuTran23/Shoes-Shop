<?php
require_once './connectDB.php';
$conn = connectDB();
$pid=$_GET['pid'];
$conn = connectDB();
$sql = "select `product`.`ProName`,
        `product`.`ProImage`,
        `product`.`ProColor`,
        `product`.`ProPrice`,
        `brand`.`BraName`
        FROM (`product` INNER JOIN `category` 
        ON `product`.`ProCateID` = `category`.`CateId`)
        INNER JOIN `brand`
        ON `product`.`ProBarID` = `brand`.`BraID`
        WHERE `product`.`ProName` = '$pid'"
        ;
$result = mysqli_query($conn, $sql);
?>



<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($data = mysqli_fetch_assoc($result)) {
?>  
<section class="productInformation">
    <div class="ProInfImg">
        <img class="ImgInf" src="./Shoes/<?php echo $data['ProImage']?>" width="900px">
    </div>
    <form action="InsertCart.php" method="post">
        <div class="ProInf">
        <table class="table">
            <tr>
                <th>Name</th>
                <th><?php echo $data['ProName']?></th>
            </tr>
            <tr>
                <th>Color</th>
                <th><?php echo $data['ProColor']?></th>
            </tr>
            <tr>
                <th>Price</th>
                <th>$<?php echo $data['ProPrice']?></th>
            </tr>
            <tr>
                <th>Brand</th>
                <th><?php echo $data['BraName']?></th>
            </tr>
            <tr>
                <th>Quantity</th>
                <th><input type="text"name="quantity" style="padding:5px;width=300px;"> </th>
            </tr>
        </table>
        <Div class="SubmitProInf">
            <input type="hidden" name="Name" value="<?php echo $data['ProName']?>">
            <input type="hidden" name="Color" value="<?php echo $data['ProColor']?>">
            <input type="hidden" name="Price" value="<?php echo $data['ProPrice']?>">
            <input type="hidden" name="Brand" value="<?php echo $data['BraName']?>">
            <input type="hidden" name="Image" value="<?php echo $data['ProImage']?>">
            <button class="AddToCartBtn" id="AddToCartBtn" name="AddToCartBtn">Add to cart</button>
        </Div>
    </form>

</div>
</section>
<?php
    }
} else {  
    echo "0 results";
}
?>



<?php 
mysqli_close($conn);
?>