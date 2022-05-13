<?php
require_once '.././connectDB.php';

$conn = connectDB();

$sql = "select * from brand";
$result = mysqli_query($conn, $sql);

?>


<div class="row">
    <div class="col-25">
      <label for="fname">Brand Category</label>

    </div>
    <div class="col-75">
       <select name="fbrand" id="fbrand">
       <?php 
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
        ?>
          <option value="<?php echo $row['BraName']?>"><?php echo $row['BraName']?></option>
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