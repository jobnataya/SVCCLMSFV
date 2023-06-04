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
            <form action="" method="">
                <input type="text" placeholder="ISBN: " id="search">
                <input type="text" placeholder="Book Name:" id="search">
                <input type="text" placeholder="Name user:" id="search">
                <input type="datetime-local" id="datetimelocal">
                <input type="submit" id="submit">
            </form>
        </div>
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
            include("db.connection.php");

                $query = isset($_GET['search']) ? $_GET['search'] : '';
            
                // Perform the database query
            if (!empty($query)) {
                $sql = "SELECT * FROM addbooks WHERE bookname LIKE '%$query%'";
                $result = $conn->query($sql);
            
                // Display the search results
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>". $row["isbn"] .  "<td>". $row["bookid"] .
                                "<td>". $row["bookname"].
                                "<td>". $row["author"].
                                "<td>". $row["bookquantity"]. "<tr><td>";
                    }
                } else {
                    echo "No results found.";
                }
            } else {
                echo "Please enter a search query.";
            }
            ?>
        </table>
            </div>
        </div>
        <div class="footer"></div>
    </div>
</body>
</html>