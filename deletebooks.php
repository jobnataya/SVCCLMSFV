<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/deletebooks.css">
    <title>Home admin</title>
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
</head>
<?php
    include("db.connection.php");
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bookname = $_POST['booknames'];

        $query = "DELETE FROM addbooks where bookname = '$bookname'";

        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> alert('Delete books Successfully!')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Error Delete books!')</script>";
        }
        
    }  
?>
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
                <li><a href=""> <i class="fa-solid fa-exclamation"></i>Issue Books</a></li>
                <li><a href=""><i class="fa-solid fa-book"></i>Issued/Return Books</a></li>
            </ul>
        </nav>
    </div>
    <div class="centerarticle">
        <ul>
            <li><a href="addbooks.php">ADD BOOKS</a></li>
            <li><a href="updatebooks.php">UPDATE BOOKS</a></li>
            <li><a href="viewbooks.php">VIEW BOOKS</a></li>
            <li class="deletebooks"><a href="deletebooks.php">DELETE BOOKS</a></li>
        </ul>
    </div>
    <div class="ddownadrticle">
        <h1>Delete Books</h1>
        <div class="form">
            <form method="POST">
        <div class="artikel">
            <label for="Bookname">Bookname</label>
            <input type="text" id="bookname" name="booknames">
            <div class="subclear">
                <input type="submit" value="Delete" id="delete">
           
            <div class="clear">
                <input type="reset" value="Clear" id="clear">
            </div>
        </div>
        </div>
    </form>
    </div>
    </div>
    </div>
    
</body>
</html>