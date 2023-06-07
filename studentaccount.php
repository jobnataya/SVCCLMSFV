<?php
session_start();
include("db.connection.php"); 


        // Check if the user is logged in
        if (!isset($_SESSION['uname'])) {
            header('Location: adminlogin.php');
            exit();
        }
        
        // Retrieve user data using the username
        $username = $_SESSION['uname'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/viewbooks.css">
    <title>Home admin</title>
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="all">
    <div class="header">
        <div class="header">
            <div class="logo"><img src="IMAGES/Logo.png" alt="Logo svcc"></div>
            <div class="text"><h1>SAINT VINCENT  COLLEGE OF CABUYAO</h1></div>
        </div>
    </div>
    <div class="article">
        <div class="leftside">
        <div class="icon">
            <img src="IMAGES/booksicon.webp" alt="">
        </div>
        <div class="texticon"><h2>Online Library Management System</h2></div>
     </div>
     <div class="logout"><a href="logout.php"><p>Log out</p></a></div>
    </div>
    <div class="leftarticle">
        <nav>
            <ul>
                <li><a href="Profile.php"><i class="fa-regular fa-id-card"></i>Profile</a></li>
                <li><a href="dashboard.php"  ><i class="fa-solid fa-table-columns"></i>Dashboard</a></li>
                <li class="studentaccount"><a href="studentaccount.php"><i class="fa-solid fa-school"></i>Student Account</a></li>
                <li><a href="issuebooks.php"> <i class="fa-solid fa-exclamation"></i>Issue Books</a></li>
                <li><a href="issuedreturnbooks.php"><i class="fa-solid fa-book"></i>Issued/Return Books</a></li>
            </ul>
        </nav>  
    </div>
    <div class="centerarticle">
        <ul>
            <li><a href="addbooks.php">ADD BOOKS</a></li>
            <li><a href="updatebooks.php">UPDATE BOOKS</a></li>
            <li><a href="viewbooks.php">VIEW BOOKS</a></li>
            <li><a href="deletebooks.php">DELETE BOOKS</a></li>
        </ul>
    </div>
<div class="searchs">
        <form method="GET" action="studentviewsearch.php">
        <input type="text" name="search" placeholder="Search..." id="search">
        <input type="submit" value="Search" id="searchbutton">
        </form>
        </div>
    <div class="ddownadrticle">
    <table>
            <tr>
                <th>ID NUMBER</th>
                <th>School Year</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Department</th>
            </tr>
            <?php
                require 'db.connection.php';

                $sql = "SELECT * from svcclms";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0 ){
                    while ($row = $result-> fetch_assoc() ) {
                     
                     ?>
                     <tr>
                        <td><?php  echo$row['idnumber'];?></td>
                        <td><?php  echo$row['year'];?></td>
                        <td><?php  echo$row['fname'];?></td>
                        <td><?php  echo$row['mname'];?></td>
                        <td><?php  echo$row['lname'];?></td>
                        <td><?php  echo$row['department'];?></td>
                     </tr>
                        <?php 
                    }
                }
            
            ?>
        </table>
    </div>
    </div>
    
</body>
</html>