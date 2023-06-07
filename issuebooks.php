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
<?php

    include("db.connection.php");
    $query = "SELECT * FROM bookborrow";
    $result = mysqli_query($conn, $query);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $isbnreq = $_POST['isbn'];
        $isbnsearch = "SELECT * FROM bookborrow WHERE `isbn` = '$isbnreq'";
        $isbnreqquery = mysqli_query($conn, $isbnsearch);

        while($row = mysqli_fetch_assoc($isbnreqquery)){

            $isbnuser = $row['isbn'];
            $booknameuser =$row['bookname'];
            $idnumberuser =$row['idnumber'];
            $fnameuser = $row['fname'];
            $lnameuser= $row['lname'];
            $issueduser=$row['datetime'];

            $bookQuery = "SELECT * FROM addbooks WHERE isbn = '$isbnuser'";
            $bookQueryResult = mysqli_query($conn, $bookQuery);

            while ($bookrow = mysqli_fetch_assoc($bookQueryResult)) {
                
                $quantity = $bookrow['bookquantity'];
                $quantity -=1;
                $total = $quantity;

                $updateQuantity = "UPDATE addbooks SET bookquantity = '$total' WHERE isbn = '$isbnuser'";
                mysqli_query($conn, $updateQuantity);

                $issued_books = "INSERT INTO issued_books (`isbn`,`bookname`,`idnumber`,`fname`,`lname`) VALUE ('$isbnuser','$booknameuser','$idnumberuser','$fnameuser','$lnameuser')";
                $issued_book_query = mysqli_query($conn, $issued_books);
                
                if(mysqli_num_rows($isbnreqquery) > 0){
                    $delete = "DELETE FROM bookborrow WHERE isbn = '$isbnreq'";
                    mysqli_query($conn, $delete);
                    header("Location: issuebooks.php");
                }
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/issuebooks.css">
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

        <table>
            <tr>
                <th>ISBN</th>
                <th>BOOK NAME</th>
                <th>ID NUMBER</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>BORROWED AT</th>
            </tr>
            <?php
            while($row = mysqli_fetch_assoc($result))
                {
            ?>
            <tr>
                <form action="" method="POST" >
                <td><?php  echo$row['isbn'];?></td>
                <td><?php  echo$row['bookname'];?></td>
                <td><?php  echo$row['idnumber'];?></td>
                <td><?php  echo$row['fname'];?></td>
                <td><?php  echo$row['lname'];?></td>
                <td><?php  echo$row['datetime'];?></td>
                <td>
                    <input type="hidden" name="isbn" value="<?php echo $row['isbn']; ?>">
                    <input type="submit" value="Issue Book" >
                </td>
                </form>
            </tr>
        </table>
        <?php
                }
        ?>
    </div>
</body>
</html>