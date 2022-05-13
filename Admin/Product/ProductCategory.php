<?php
require_once '.././connectDB.php';

$conn = connectDB();

$sql = "select * from category";
$result = mysqli_query($conn, $sql);

?>


<div class="row">
    <div class="col-25">
      <label for="fname">Product Category</label>

    </div>
    <div class="col-75">
       <select name="fcate" id="fcate">
       <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
          <option value="<?php echo $row['CateName']?>"><?php echo $row['CateName']?></option>
        <?php   }
            } else {
                echo "0 results";
            }
        ?>
        </select>
    </div>
  </div>

<?php
mysqli_close($conn);
?>