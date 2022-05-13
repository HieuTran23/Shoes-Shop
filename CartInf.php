<?php
require_once './connectDB.php';
if(isset($_SESSION['Email']) || isset($_SESSION['Password'])){
    $total =0;
    $u = 0;
    $arrayBill = array();
?>

<div class="cartBox" style="min-height: 300px;" >
    <h1>
        Shopping Cart
    </h1>
    <table width=100%   >
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
                <th>Edit</th>
                <th>Delete</th>
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
                        echo "<td>".$value."</td>";
                    }elseif($key==1){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td><img src=\"./Shoes/".$value."\"></td>";
                    }elseif($key==2){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td>".$value."</td>";
                    }elseif($key==3){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td>".$value."</td>";
                    }elseif($key==4){
                        echo "<input type='hidden' name='name$key'  value='".$value."'>";
                        echo "<td>".$value."</td>";
                        $a=$value;
                    }elseif($key==5){
                        if($value==null){
                            $value=1;
                        }
                        echo "<td><input type='text' name ='name$key' value='".$value."' style='padding:5px;font-size:20px;max-width:100px;'></td>";
                        $b=$value;  
                    }
                    $bill = ($a*$b);
                    
                    $arrayBill[$u] = $bill;

                    
                }
                $u++;
                echo "<td> $".($bill)."</td>";
                echo "<td><input type='submit' name='event' value='Update' style='padding:5px;cursor:pointer;background-color:black;color:white;font-size:20px;border-radius:5px;'></td>";
                echo "<td><input type='submit' name='event' value='Delete' style='padding:5px;cursor:pointer;background-color:rgb(75,175,175);color:black;font-size:20px;border-radius:5px;'onclick=\"return confirm('Are you sure you want to delete this item?');\"></td>";
            ?>
                </form>   
            <?php
                $total += $bill; 

                $_SESSION['total']  =$total;
                $_SESSION['arrayBill'] =$arrayBill;
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
           
            </form>
            </td>
            <td></td>
            <td></td>

        </tbody>
    </table>
    <a href="CartView.php" style='position:absolute;right:23%;margin:20px;padding:2px 20px 2px 20px;cursor:pointer;color:White;background-color:red;font-size:25px;border-radius:5px;box-shadow:5px 5px 5px rgba(0,0,0,0.5);border:2px solid black;'>Proceed to order</a>

               
</div>
<?php

}else{
    header("Location:index.php?id=error");
}
?>