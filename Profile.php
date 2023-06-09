<?php
include("db.connection.php");
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header('Location: index.php');
    exit();
}
//Retrieve user data using the username
$username = $_SESSION['uname'];

//Display user data

$sql = "SELECT * FROM adminlogin WHERE uname = '$username'";

$query = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/profile.css">
    <title>Profile</title>
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
                <li class="Profile"><a href="Profile.php"><i class="fa-regular fa-id-card"></i>Profile</a></li>
                <li><a href="dashboard.php"  ><i class="fa-solid fa-table-columns"></i>Dashboard</a></li>
                <li><a href="studentaccount.php"><i class="fa-solid fa-school"></i>Student Account</a></li>
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
    <div class="ddownadrticle"> 
    <?php 
                include("db.connection.php");

                if ($query-> num_rows > 0 ) {
                    while ($row = $query-> fetch_assoc() ) {
                    
                ?>
                <table>
                    <tr>
                        <th>First Name:</th>
                        <td><?php echo$row['fname'];?></td>
                        
                        <th>Gender:</th>
                        <td><?php echo$row['gender'];?></td>
                    </tr>
                    <tr>
                        <th>Middle Name:</th>
                        <td><?php echo$row['mname'];?></td>

                        <th>Last Name:</th>
                        <td><?php echo$row['lname'];?></td>
                    </tr>
                    <tr>
                        <th>Birthday:</th>
                        <td><?php echo$row['bday'];?></td>
                        <th>Contact Number:</th>
                        <td><?php echo$row['contactnumber'];?></td>
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