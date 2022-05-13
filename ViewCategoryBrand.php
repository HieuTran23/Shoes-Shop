<?php
require_once './connectDB.php';

$conn = connectDB();

$sql = "select BraName from brand";
$result = mysqli_query($conn, $sql);
?>

<section class="sectionCategory">
    <div><img src="./Images/Images.png" width="100%"></div>
    <section class="sectionCategory1">
        <div class="divCategory1-1">
            <ul>
                <h4>Brand</h4>
                <li><a href="./Category.php?cid=All">All</a></li>
                <?php if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($data = mysqli_fetch_assoc($result)) {
                ?>
                <li><a href="./Category.php?cid=<?php echo $data['BraName']?>"><?php echo $data['BraName']?></a></li>
                <?php }
                    } else {
                        echo "0 results";
                    }
                ?>     
            </ul>