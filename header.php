<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link
    href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap"
    rel="stylesheet"    
    />
    <link rel="stylesheet" href="./style.css">
    <title>Shoes</title>
</head>
<body>


    <!-- Header -->
<header id="header" class="header">
    <div class="navigation">
        <div class="container">
            <nav class="nav">
                <div class="logoContainer">
                    <img class="logoImage" src="./Images/Logo.png" alt="DallatoLogoShop">
                    <h2 class="logo"><a class="logo" href="./index.php">DlShoes</a></h2>
                </div>
                <nav>
                    <div class = "nav-links">
                    <ul>  
                        <li class = "nav-link"><a  href="./Category.php?cid=Man">Man</a></li>
                        <li class = "nav-link"><a  href="./Category.php?cid=Woman">Woman</a></li>
                        <li class = "nav-link"><a  href="./Category.php?cid=Kids">Kids</a></li>
                        <li class = "nav-link">
                        <a  href="./Category.php?cid=All">Brand</a>
                        <div class="dropdown">
                            <ul>
                                <li class="dropdown-link">
                                    <a href="./Category.php?cid=Adidas">Adidas</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="./Category.php?cid=Nike">Nike</a>
                                </li>
                                <li class="dropdown-link">
                                    <a href="./Category.php?cid=Jordan">Jordan</a>
                                </li>
                                <li class="dropdown-link">
                                <a href="./Category.php?cid=All">Other Brand</a>
                                <div class="dropdown second">
                                    <ul>
                                        <li class="dropdown-link">
                                            <a href="./Category.php?cid=Yeezy">Yeezy</a>
                                        </li>
                                        <li class="dropdown-link">
                                            <a href="#">Converse</a>
                                        </li>
                                        <li class="dropdown-link">
                                            <a href="#">Off-white</a>
                                        </li>
                                        <div class="arrow"></div>
                                    </ul>
                                </div>
                            </li>
                                <div class="arrow"></div>
                            </ul>
                        </div>
                        </li>
                        <li class = "nav-link"><a  href="Contacus.php">Contact</a></li>
                    </ul>
                    </div>
                </nav>
                <div class = "searchContainer">
                    <div class="searchtext">
                        <input type="text" class ="Search" placeholder="Search Here">
                    </div>
                </div>
                <div class="cart">
                    <a href="./Cart.php"><img class="cartlogo" src="./Images/Bag.png" alt="bag"></a>
                </div> 
            </nav>
        </div>
    </div>
</header> 

<!-- Main -->
<main id="main" style="margin:5%;">