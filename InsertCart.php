<?php
    session_start();
    $name = $_POST['Name'];
    $image = $_POST['Image'];
    $color = $_POST['Color'];
    $brand = $_POST['Brand'];
    $price = $_POST['Price'];
    $quantity =$_POST['quantity'];
    $product = array($name,$image,$color,$brand,$price,$quantity);
    
    $_SESSION[$name] = $product;
    
    header('location:Cart.php')
?>
