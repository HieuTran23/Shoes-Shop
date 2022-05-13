<?php
session_start();

    $name = $_POST['name0'];
    $image = $_POST['name1'];
    $color = $_POST['name2'];
    $brand = $_POST['name3'];
    $price = $_POST['name4'];
    $quantity =$_POST['name5'];
    $event = $_POST['event'];

    $product = array($name,$image,$color,$brand,$price,$quantity);
    
    
    if($event == "Update"){
        $_SESSION[$name]= $product;
        header('location:Cart.php');
    }
    elseif($event == "Delete"){
        unset($_SESSION[$name]);
        header('location:Cart.php');
    }
?>