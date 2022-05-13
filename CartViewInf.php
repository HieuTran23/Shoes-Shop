<?php
require_once './connectDB.php';
if(isset($_SESSION['Email']) || isset($_SESSION['Password'])){
    $total =0;
    $u = 0;
    $arrayBill = array();
    $isUpdated = 0;
    if(isset($_SESSION['CusName'])  &&
        isset($_SESSION['Phone'])  &&
        isset($_SESSION['Address']) 
        ){
            $Email = $_SESSION['Email'];
            $CusName = $_SESSION['CusName'];
            $Phone = $_SESSION['Phone'];
            $Address = $_SESSION['Address'];
            $CusID = $_SESSION['CusID'];
            $isUpdated = 1;

    }
?>
<div style='display:flex;'>
<div class="cartBox" style="min-height: 300px;" >
    <h1>
        Shopping Cart
    </h1>
    <table width=90% style='box-shadow:5px 5px 15px rgba(0,0,0,0.5);min-height:450px;margin:auto;border-radius:15px;padding:30px;'>
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Image</th>
                <th>Color</th>
                <th>Brand</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sno = 1;
            ?>
            <?php
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
                $a=0;
                $b=0;
                echo "<tr>";
                echo "<td>". ($sno++). "</td>";
            ?>
                <form action="editCard.php" method="post">
            <?php
                foreach($products as $key => $value){
                    if($key==0){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td style=\"text-align:center;\">".$value."</td>";
                    }elseif($key==1){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td style=\"text-align:center;\"><img src=\"./Shoes/".$value."\"></td>";
                    }elseif($key==2){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td style=\"text-align:center;\">".$value."</td>";
                    }elseif($key==3){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td style=\"text-align:center;\">".$value."</td>";
                    }elseif($key==4){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td style=\"text-align:center;\">".$value."</td>";
                        $a=$value;
                    }elseif($key==5){
                        if($value==null){
                            $value=1;
                        }
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td style=\"text-align:center;\">".$value."</td>";
                        $b=$value;  
                    }
                    $bill = ($a*$b);

                    
                }
                $u++;
                echo "<td style=\"text-align:center;\"> $".($bill)."</td>";
                ?>
                </form>   
                <?php
                    $total += $bill; 
                    echo "</tr>";
                
                }
                    
                ?>
        </tbody>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="font-size:30px;font-weight:700;color:red;">All Total</td>
            <td style="font-size:25px;">$<?php echo $total; ?></td>
            <td>
            <form action="InserOrder.php" method="post">
            <input type="submit" name="submit" value="Order"style='margin:20px;padding:2px 20px 2px 20px;cursor:pointer;background-color:Red;color:white;font-size:30px;border-radius:5px;box-shadow:5px 5px 5px rgba(0,0,0,0.5);border:2px solid black;' onclick="return confirm('Are you sure you want to order this item?');">
            </form>
            </td>
        </tbody>
    </table>
               
</div>
<div class="boxCreateAccount" style="box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.5);width: 400px;margin:auto;border-radius:15px;margin-top:30px;padding:50px 0 50px 0;">
    <h1 style="text-align: center;">Edit your information</h1>
    <form action="InsertCustomer.php" method="post">
        <div class="Login">
                <input id="Email" name="Email" class="LoginBox" type="text" value="<?php echo $Email?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="Name">
                <input id="CusName" name="CusName" class="LoginBox" type="text" placeholder="<?php echo $CusName?>">
                <input id="Phone" name="Phone" class="LoginBox" type="text" placeholder="<?php echo $Phone?>">
                <input id="Address" name="Address" class="LoginBox" type="text" placeholder="<?php echo $Address?>">
            <button class="LoginBox" id="SubmitOrder" name="SubmitOrder" style="cursor:pointer;"onclick="return confirm('Are you sure you want to edit your address?');">Submit</button>
        </div>
        
    </form>
    <a href="Cart.php" class="LoginBox" style="color:black;border:2px solid black;border-radius:3px;" > Back Cart Site</a>
</div>
</div>
<?php

}else{
    header("Location:index.php?id=error");
}
?>