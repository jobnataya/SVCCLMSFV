<?php
include("db.connection.php");
session_start(); 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="CSS/studentborrowbooks.css">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
</head>
<body class="all" style="background:url(IMAGES/books.jpg)">
    <div>
        <div class="header">
            <div class="logo"><img src="IMAGES/Logo.png" alt=""></div>
            <div class="textlogo">
                 <h1> Saint Vincent College of Cabuyao</h1>
                 <div class="logout"><a href="logoutforstudents.php"><p>Logout</p></a></div>
            </div>
        </div>
        <div class="article">
            <div class="leftside">
                <div class="navleft">
                    <ul>
                        <li ><a href="studentprofile.php"><i class="fa-regular fa-user fa-2xl"></i>Profile</a></li>
                        <li><a href=""><i class="fa-solid fa-book fa-2xl"></i>Viewbooks</a></li>
                        <li><a href=""> <i class="fa-solid fa-rotate-left fa-2xl"></i>Borrowed Books</a></li>
                    </ul>
                </div>
            </div>
            <div class="rightside">
                <div class="form">
                <form action="" method="">
                    <label for="ISBN">ISBN</label>
                    <input type="text" placeholder="ISBN">
                    <br>
                    
                </form>
                </div>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>