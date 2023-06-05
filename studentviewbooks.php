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
   <link rel="stylesheet" href="CSS/studentviewbooks.css">
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
            <table>
            <tr>
                <th>ISBN</th>
                <th>SERIES</th>
                <th>BOOK NAME</th>
                <th>AUTHOR</th>
                <th>BOOK QUANTITY</th>
            </tr>
            <?php
                require 'db.connection.php';

                $sql = "SELECT * from addbooks";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0 ){
                    while ($row = $result-> fetch_assoc() ) {
                     
                     ?>
                     <tr>
                        <td><?php  echo$row['isbn'];?></td>
                        <td><?php  echo$row['bookid'];?></td>
                        <td><?php  echo$row['bookname'];?></td>
                        <td><?php  echo$row['author'];?></td>
                        <td><?php  echo$row['bookquantity'];?></td>
                        <td>
                            <form action="studentviewbooksinfo.php" method="post" >
                            <input type="hidden" name="bookname" value="<?php echo $row['bookname'] ?>">
                                <input type="hidden" name="description" value="<?php echo $row['description'] ?>">
                                <input type="hidden" name="isbn" value="<?php echo $row['isbn'] ?>">
                                <input type="submit" name="submit" class="submit">
                            </form>
                        </td>
                        <td>
                            <form action="">
                                <input type="submit" name="borrow" class="submit" value="Borrow">
                            </form>
                        </td>
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