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

$AdminName = "";
if (isset($_GET['id'])) {
    $AdminName = $_GET['id'];
} 

$Password="";
$isUpdated = 0;
if ($AdminName !="") {
    $sql = "select * from admin where AdminName = $AdminName";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)) {
      $Password = $row['Password'];
    }
    $isUpdated = 1;
}
?>
<h2>Admin FORM</h2>
<p>This is function of adminstrator to insert, edit, delete one category.</p>
<p><a href="../Adminindex.php?=Admin">Back to Admin page</a></p>
<div class="container">
  <form action="Insert_Admin.php" method="POST">
  <input type="hidden" id="controlUpdate" name="controlUpdate" value="<?php echo $isUpdated?>" />
  <div class="row">
    <div class="col-25">
      <label for="fname">Admin Name</label>
    </div>
    <div class="col-75">
      <input type="text" id="fAdminName" name="fAdminName" value="<?php echo $AdminName?>"<?php if ($isUpdated == 1) echo "readonly";?> placeholder="Admin Name..">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="fname">Password</label>
    </div>
    <div class="col-75">
      <input type="text" id="fPassword" name="fPassword" value="<?php echo $Password?>" placeholder="category name..">
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
