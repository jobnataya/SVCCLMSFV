<?php 
    include("db.connection.php");
    
    if (isset($_POST['submit'])) {
        $isbn = $_POST['isbn'];
        $description = $_POST['description'];
        
        echo $isbn;
        echo $description;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/viewbooks.css">
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
            <li class="viewbooks"><a href="viewbooks.php">VIEW BOOKS</a></li>
            <li><a href="deletebooks.php">DELETE BOOKS</a></li>
        </ul>
    </div>
<div class="searchs">
        <form method="GET" action="testing.php">
        <input type="text" name="search" placeholder="Search..." id="search">
        <input type="submit" value="Search" id="searchbutton">
        </form>
        </div>
    <div class="ddownadrticle">
        <table>
            <tr>
                <th>ISBN</th>
                <th>SERIES</th>
                <th>BOOK NAME</th>
                <th>AUTHOR</th>
                <th>BOOK QUANTITY</th>
                <th>View Books</th>
            </tr>
            <?php
                require 'db.connection.php';

                $query = isset($_GET['search']) ? $_GET['search'] : '';

                $sql = "SELECT * FROM addbooks WHERE isbn LIKE '%$query%' OR bookid LIKE '%$query%' OR bookname LIKE '%$query%' OR author LIKE '%$query%' OR bookquantity LIKE '%$query%'";
                $result = $conn->query($sql);

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
                            <form action="" method="post">
                                <input type="hidden" name="description" value="<?php echo $row['description'] ?>">
                                <input type="hidden" name="isbn" value="<?php echo $row['isbn'] ?>">
                                <input type="submit" name="submit" >
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
    </div>
</body>
</html>