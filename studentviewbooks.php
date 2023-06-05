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
                <div class="searchs">
        <form method="GET" action="studentviewbookssearch.php">
        <input type="text" name="search" placeholder="Search..." id="search">
        <input type="submit" value="Search" id="searchbutton">
        </form>
        <div class="borrowbooks">
            <form action="" method="POST">
                <input type="text" placeholder="Approval"id="search" name="approval" required>
                <input type="text" placeholder="ISBN: " id="search" name="isbn">
                <input type="text" placeholder="Book Name:" id="search" name="bookname" required>
                <input type="text" placeholder="Name user:" id="search" name="nameuser" required>
                <input type="datetime-local" id="datetimelocal" name="datetimelocal" required>
                <input type="hidden" value="Not Approve" name="status">
                <input type="submit" id="submit" name="submit">
            </form>
        </div>
        <?php
        include("db.connection.php");
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
           $approval = $_POST['approval'];
           $isbn = $_POST['isbn'];
           $bookname = $_POST['bookname'];
           $nameuser = $_POST['nameuser'];
           $datetimelocal = $_POST['datetimelocal'];
           $status = $_POST['status'];
    
            if (!empty($bookname) && !empty($approval)) {
                
                $query = "INSERT INTO bookborrow (`approval`,`isbn`,`bookname`,`nameuser`,`datetimelocal`,`status`) values ('$approval','$isbn','$bookname','$nameuser','$datetimelocal','$status')";
    
                mysqli_query($conn, $query);
    
                echo "<script type = 'text/javascript'> alert ('Borrow Books Successfully')</script>";
                
                if (!empty($bookname) && !empty($approval)) {
                    $query = "INSERT INTO returnbooks (`approval`,`isbn`,`bookname`,`nameuser`,`datetimelocal` ) values ('$approval','$isbn','$bookname','$nameuser','$datetimelocal')";
    
                    mysqli_query($conn, $query);
                }
            }
            else{
                echo "<script type = 'text/javascript'> alert ('Please Fill up all Borrow Books')</script>";
            }
        }
    ?> 
        </div>
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

                $sql = "SELECT isbn, bookid, bookname, author, bookquantity from addbooks";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0 ){
                    while ($row = $result-> fetch_assoc() ) {
                        echo "<tr><td>". $row["isbn"] .  "<td>". $row["bookid"] .
                         "<td>". $row["bookname"].
                          "<td>". $row["author"].
                         "<td>". $row["bookquantity"]. 
                         "<tr><td>";

                    }
                    echo "</table>";
                }
                else{
                    echo "0 result";
                }
                $conn-> close();
            ?>
        </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>