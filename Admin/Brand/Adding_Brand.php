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
$BraID= "";
$BraName="";
$isShow = 0;
$isUpdated = 0;
if ($id !="") {
    $sql = "select BraID, BraName, IsShow from brand where BraID = $id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
        $BraID = $row['BraID'];
        $BraName = $row['BraName'];
        $isShow = $row['IsShow'];
    }
    $isUpdated = 1;
}
?>
<h2>BRAND FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one brand.</p>
<p><a href="../Adminindex.php?=Amid=Brand">Back to Brand page</a></p>
<div class="container">
  <form action="Insert_Brand.php" method="POST">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />
  <div class="row">
    <div class="col-25">
      <label for="fname">Brand Id</label>
    </div>
    <div class="col-75">
      <input type="text" id="fid" name="fid" value="<?php echo $BraID?>" <?php if ($isUpdated == 1) echo "readonly";?> placeholder="brand id..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Brand Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fname" name="fname" value="<?php echo $BraName?>" placeholder="brand name..">
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
    <input type="submit" value="Submit" onclick="return confirm('Are you sure you want to delete this item?');">
  </div>
  </form>
</div>

</body>
</html>
<?php
    mysqli_close($conn);
?>
