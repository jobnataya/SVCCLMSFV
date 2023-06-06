<?php
session_start();
include("db.connection.php"); 
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
                <th>DATE TIME</th>
            </tr>
            <?php
                require 'db.connection.php';

                $sql = "SELECT * from bookborrow";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0 ){
                    while ($row = $result-> fetch_assoc() ) {
                     
                     ?>
                     <tr>
                        <td><?php  echo$row['isbn'];?></td>
                        <td><?php  echo$row['bookname'];?></td>
                        <td><?php  echo$row['idnumber'];?></td>
                        <td><?php  echo$row['fname'];?></td>
                        <td><?php  echo$row['lname'];?></td>
                        <td><?php  echo$row['datetime'];?></td>
                        <td>
                            <form action="" method="post">
                            <input type="hidden" name="bookname" value="<?php echo $row['bookname']?>">
                                <input type="hidden" name="fname"  value="<?php echo $row['fname'] ?>">
                                <input type="hidden" name="idnumber"  value="<?php echo $row['idnumber'] ?>">
                                <input type="hidden" name="lname"  value="<?php echo $row['lname'] ?>">
                                <input type="hidden" name="isbn" value="<?php echo $row['isbn'] ?>">
                                <input type="submit" name="issue" value="ISSUE" >
                                <input type="hidden" name="status" value="Issued" >
                            </form>
                        </td>
                    </tr>
                        <?php 
                    }
                }
            ?>
        </table>
        <?php     
                    include("db.connection.php");
                    
                    if (isset($_POST['issue'])) {
                        
                        $isbn = $_POST['isbn']; 
                        $bookname= $_POST['bookname'];
                        $idnumber = $_POST['idnumber'];
                        $borrower =  $_POST['fname'];
                        $lname = $_POST['lname'];
                        $status = $_POST['status'];

                        
        if (!empty($isbn) && !empty($borrower)) {

  
            $query = "INSERT INTO returnbooks (`isbn`,`bookname`,`idnumber`,`nameborrower`,`lname`,`status`) values ('$isbn','$bookname','$idnumber','$borrower','$lname','$status')";

            mysqli_query($conn, $query);

                if (!empty($isbn) && !empty($borrower)) {
            

            echo "<script type = 'text/javascript'> alert ('Borrow Books Successfully')</script>";
        }
    }

     }
     ?>
    </div>
    
</body>
</html>