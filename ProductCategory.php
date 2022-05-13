<?php
    require_once './connectDB.php';
    if(isset($_GET['cid'])){
        $cid=$_GET['cid'];
    }
    else $cid="All";
    if($cid == 'All'){
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
                ";
        $result = mysqli_query($conn, $sql);
        
    }
    else{
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
                WHERE `category`.`CateName` ='$cid'
                or `brand`.`BraName` ='$cid'
                ";
        $result = mysqli_query($conn, $sql);
    }

?>


            <div class="divCategory1-2">
                <div class="siteMapCategory">
                    <p>Category <span>>></span><?php echo " ". $cid ?></p>
                </div>
                <?php 
                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($data = mysqli_fetch_assoc($result)) {
                ?>
                <div class="productCardBox">
                    <div class="slide-img">
                    <img src="./Shoes/<?php echo $data['ProImage']?>">
                    <div class="overlay">
                        <a href="./ViewProduct.php?pid=<?php echo $data['ProName']?>" class="buy-btn">Buy Now</a>	
                    </div>
                    </div>
                    <div class="detail-productCardBox">
                        <div class="type">
                            <a href="./ViewProduct.php?pid=<?php echo $data['ProName']?>"><?php echo $data['ProName']?></a>
                            <span><?php echo $data['BraName']?></span>
                            <span><?php echo $data['BraName']?></span>
                        </div>
                        <a href="./ViewProduct.php?pid=<?php echo $data['ProName']?>" class="price">$<?php echo $data['ProPrice']?></a>
                    </div>
                </div>
                <?php 
                    }
                        } else {
                            echo "0 results";
                        }
                ?>
            </div>  
        <?php 
        mysqli_close($conn);
        ?>
    </section>
</section>