<?php
    ob_start();
    // include header.php file
    include ('header.php');
?>

<!--Login-->

<?php
include ('Login.php');
?>  

<?php
    if(isset($_GET['id'])){
        echo "<p style=\"color:red;font-size:30px;text-align:center; margin: 0 0 20vh 0\">Your accout dont have any information</p>";
    }
    include ('CartInf.php');
?>  
<?php
include('OrderHistory.php');
?>

<?php
    include ('footer.php');
?>  
