<?php
require_once '../connectDB.php';

$conn = connectDB();
?>
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}
</style>
</head>
<body>
<?php

$id = "";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} 
$ProId= "";
$ProName="";
$proImage = "";
$proBrand = "";
$proColor = "";
$proNumber = "";
$proCate = "";
$proPrice ="";
$proSize ="";
$isShow = 0;
$isUpdated = 0;
if ($id !="") {
    $sql = "select *
          FROM (`product` INNER JOIN `category` 
          ON `product`.`ProCateID` = `category`.`CateId`)
          INNER JOIN `brand`
          ON `product`.`ProBarID` = `brand`.`BraID`
          where ProId = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $ProId = $row['ProID'];
        $ProName = $row['ProName'];
        $proImage = $row['ProImg'];
        $proBrand = $row['BraName'];
        $proColor = $row['ProColor'];
        $proNumber = $row['Number'];
        $proCate = $row['CateName'];
        $proPrice = $row['ProPrice'];
        $proSize =$row['Size'];
        $isShow = $row['IsShow'];
    }
    $isUpdated = 1;
}
?>
<h2>PRODUCT FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one product.</p>
<p><a href="../Adminindex.php?Amid=Product">Back to Product page</a></p>
<div class="container">
  <form action="Insert_Product.php" method="POST" enctype="multipart/form-data">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Id</label>
    </div>
    <div class="col-75">
      <input type="text" id="fid" name="fid" value="<?php echo $ProId?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="product id..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" value="<?php echo $ProName?>" placeholder="Product name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Image</label>
    </div>
    <div class="col-75">
      <input type="file" name="image">
    </div>
  </div>

  <?php
    include ('ProductBrand.php')
  ?>
  
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Color</label>
    </div>
    <div class="col-75">
      <input type="text" id="fcolor" name="fcolor" value="<?php echo $proColor?>" placeholder="Product Color..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Number</label>
    </div>
    <div class="col-75">
      <input type="text" id="fnumber" name="fnumber" value="<?php echo $proNumber?>" placeholder="Product Number..">
    </div>
  </div>

<?php
  include ('ProductCategory.php')
?>

  <div class="row">
    <div class="col-25">
      <label for="fname">Product Price</label>
    </div>
    <div class="col-75">
      <input type="text" id="fprice" name="fprice" value="<?php echo $proPrice?>" placeholder="Product Price..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Product Size</label>
    </div>
    <div class="col-75">
      <input type="text" id="fsize" name="fsize" value="<?php echo $proSize?>" placeholder="Product Size..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Is showed?</label>
    </div>
    <div class="col-75">
      <input type="checkbox" id="isshowed" name="isshowed" <?php if ($isShow == 1) echo "checked";?> />
    </div>
  </div>
  
  <div class="row">
    <input type="submit" value="Submit" onclick="return confirm('Are you sure?');">
  </div>
  </form>

</div>

</body>
</html>
<?php
    mysqli_close($conn);
?>

