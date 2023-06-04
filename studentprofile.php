<?php
include("db.connection.php");
session_start(); 

// Check if the user is logged in
if (!isset($_SESSION['uname'])) {
    header('Location: studentprofile.php');
    exit();
}
//Retrieve user data using the username
$username = $_SESSION['uname'];

//Display user data

$sql = "SELECT * FROM svcclms WHERE uname = '$username'";

$query = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
    <link rel="stylesheet" href="CSS/studentprofile.css">
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
                        <li><a href="studentviewbooks.php"><i class="fa-solid fa-book fa-2xl"></i>Viewbooks</a></li>
                        <li><a href=""> <i class="fa-solid fa-rotate-left fa-2xl"></i>Borrowed Books</a></li>
                    </ul>
                </div>
            </div>
            <div class="rightside">
            <table>
            <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Birth Day</th>
                <th>Gender</th>
                <th>Year</th>
                <th>ID Number</th>
                <th>Department</th>
                <th>User Type</th>
                <th>Contact Number</th>
            </tr>
            <?php
        // Check if the user is logged in
        if (!isset($_SESSION['uname'])) {
            header('Location: Profile.php');
            exit();
        }
        
        // Retrieve user data using the username
        $username = $_SESSION['uname'];
        
        // Display user data
        $sql = "SELECT * FROM svcclms WHERE uname = '$username'";
        $query = mysqli_query($conn, $sql);
        
        while ( $row = mysqli_fetch_assoc($query )) {
            echo "<tr><td>". $row["fname"] .  "<td>". $row["mname"] .
                 "<td>". $row["lname"].
                 "<td>". $row["bday"]. 
                 "<td>". $row["gender"].
                 "<td>". $row["year"].
                 "<td>". $row["idnumber"].
                 "<td>". $row["department"].
                 "<td>". $row["usertype"].
                 "<td>". $row["contactnumber"].
                 "<tr><td>";
        }
        // Display other user information
        ?>
        </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>