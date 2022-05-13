<?php
require_once './connectDB.php';

$conn = connectDB();

$sql = "select CateName from category";
$result = mysqli_query($conn, $sql);
?>

    <ul>
        <h4>Type</h4>
        <li><a href="./Category.php?cid=All">All</a></li>
        <?php if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($data = mysqli_fetch_assoc($result)) {
        ?>
        <li><a href="./Category.php?cid=<?php echo $data['CateName']?>"><?php echo $data['CateName']?></a></li>
        <?php }
            } else {
                echo "0 results";
            }
        ?>
    </ul>
<!--    <ul>
        <h4>Size type</h4>
        <li><a href="#">All</a></li>
        <li><a href="#">11</a></li>
        <li><a href="#">12</a></li>
        <li><a href="#">13</a></li>
    </ul>-->
</div>   