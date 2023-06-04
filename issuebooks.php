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
                <th>Approval</th>
                <th>ISBN</th>
                <th>BOOK NAME</th>
                <th>NAME USER</th>
                <th>DATE & TIME</th>
                <th>STATUS</th>
            </tr>
            <?php
                require 'db.connection.php';

                $sql = "SELECT * from bookborrow";
                $result = $conn-> query($sql);

                if($result-> num_rows > 0 ){
                    while ($row = $result-> fetch_assoc() ) {
                        echo "<tr><td>". $row["approval"] .  "<td>". $row["isbn"] .
                         "<td>". $row["bookname"].
                          "<td>". $row["nameuser"].
                         "<td>". $row["datetimelocal"]. 
                         "<td>". $row["status"]. 
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
    <div class="ddownadrticle2"> 
        <h1>Approval Book Issue</h1>
           <form action="" method="POST">
                <label for="Approval">Approval:  </label>
                <input type="text" placeholder="Approval" id="search" name="approval">
                <br>
                <label for="Status">Status: </label>
                <input type="text" placeholder="Status" id="search1" name="status">
                <br>
                <input type="submit" name="submit" id="submit" value="Submit">
           </form>
    </div>
    <?php
    include("db.connection.php");

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        $approval =$_POST['approval'];
        $status =$_POST['status'];

        $query = "UPDATE bookborrow SET `status` = '$status' WHERE approval = '$approval'";

        
        
        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> alert('Update books Successfully!')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Error Update books!')</script>";
        }
        
    }  
?>
    </div>
    
</body>
</html>