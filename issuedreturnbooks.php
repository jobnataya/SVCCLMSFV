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
                <li><a href=""><i class="fa-solid fa-book"></i>Issued/Return Books</a></li>
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
                <th>NAME BORROWER</th>
                <th>STATUS</th>
                <th>RETURNED</th>
                <th>DATE TIME RETURNED</th>
            </tr>
            <?php
                require 'db.connection.php';

                $sql = "SELECT * from returnbooks";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0 ){
                    while ($row = $result-> fetch_assoc() ) {
                     
                     ?>
                     <tr>
                        <td><?php  echo$row['isbn'];?></td>
                        <td><?php  echo$row['bookname'];?></td>
                        <td><?php  echo$row['idnumber'];?></td>
                        <td><?php  echo$row['nameborrower'];?></td>
                        <td><?php  echo$row['status'];?></td>
                        <td><?php  echo$row['returned'];?></td>
                        <td><?php  echo$row['datetime'];?></td>
                     </tr>

                     
                        
                    
                        <?php 
                    }
                }
            ?>
        </table>
    </div>
    <div class="ddownadrticle2"> 
        <h1>Issued Return books</h1>
           <form action="" method="POST">
                <label for="Approval">ID NUMBER:  </label>
                <input type="text" placeholder="Approval" id="search" name="approval">
                <br>
                <input type="datetime-local" name="datetime" class="datetime">
                <br>
                <input type="hidden" name="status" value="Returned" >
                <input type="submit" name="submit" id="submit" value="Submit">
                <input type="hidden" name="idnumber" value="<?php echo $row['idnumber'] ?>">
                <input type="hidden" name="datetime" value="<?php echo $row['datetime'] ?>">
           </form>
    </div>
    <?php
    include("db.connection.php");

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        $idnumber =$_POST['idnumber'];
        $status =$_POST['status'];
        $datetime = $_POST['datetime'];

        $query = "UPDATE returnbooks SET `status` = '$status' SET `datetime` = '$datetime' WHERE idnumber = '$idnumber'";

        
        
        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> alert('Returend books Successfully!')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Error Returend books!')</script>";
        }
        
    }  
?>
    </div>
    
</body>
</html>