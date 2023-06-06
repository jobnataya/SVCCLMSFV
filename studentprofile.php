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
                    </ul>
                </div>
            </div>
            <div class="rightside">
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

                        <th>School Year:</th>
                        <td><?php echo$row['year'];?></td>
                    </tr>
                    <tr>
                        <th>Last Name:</th>
                        <td><?php echo$row['lname'];?></td>

                        <th>Department:</th>
                        <td><?php echo$row['department'];?></td>
                    </tr>
                    <tr>
                        <th>Birthday:</th>
                        <td><?php echo$row['bday'];?></td>
                        

                        <th>Address:</th>
                        <td><?php echo$row['address'];?></td>
                    </tr>   
                    <tr>
                        <th>School ID:</th>
                        <td><?php echo$row['idnumber'];?></td>

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
        <div class="footer"></div>
    </div>
</body>
</html>