<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/updatebooks.css">
    <title>Home admin</title>
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
</head>
<?php
    include("db.connection.php");
    session_start();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
     {
        $date = $_POST["date"];
        $isbn = $_POST["isbn"];
        $bookid = $_POST["bookid"];
        $bookname = $_POST["bookname"];
        $author = $_POST["author"];
        $bookquantity = $_POST["bookquantity"];
        $description = $_POST["description"];

        

        $query = "UPDATE addbooks SET `date` = '$date', isbn = '$isbn', bookid = '$bookid', bookname = '$bookname', author = '$author', bookquantity = '$bookquantity', `description` ='$description' WHERE bookname = '$bookname'";
        
        if (mysqli_query($conn, $query)) {
            echo "<script type='text/javascript'> alert('Update books Successfully!')</script>";
        } else {
            echo "<script type='text/javascript'> alert('Error Update books!')</script>";
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
                <li><a href="issuebooks.php"> <i class="fa-solid fa-exclamation"></i>Issue Books</a></li>
                <li><a href="issuedreturnbooks.php  "><i class="fa-solid fa-book"></i>Issued/Return Books</a></li>
            </ul>
        </nav>
    </div>
    <div class="centerarticle">
        <ul>
            <li><a href="addbooks.php">ADD BOOKS</a></li>
            <li class="updatebooks"><a href="updatebooks.php">UPDATE BOOKS</a></li>
            <li><a href="viewbooks.php">VIEW BOOKS</a></li>
            <li><a href="deletebooks.php">DELETE BOOKS</a></li>
        </ul>
    </div>
    <div class="ddownadrticle">
        <h1>Update books</h1>
        <div class="forms">
        <form method="POST">
            <label for="dateentry">Date of Entry</label>
            <input type="date" name="date" required >
            <br>
            <label for="isbn">ISBN</label>
            <input type="text" id="isbn" maxlength="13" name="isbn"  required>
            <br>
            <label for="bookid">SERIES</label>
            <input type="text" id="bookid" maxlength="20" name="bookid"  required>
            <br>
            <label for="Booke Name">Book Name</label>
            <input type="text" id="bookname" name="bookname">
            <br>
            <label for="Author">Author</label>
            <input type="text" name="author" maxlength="20" id="Author"   required>
            <br>
            <label for="Descrption">Description</label>
            <input type="text" name="description" id="Author" required> 
            <br>
            <label for="bookquantity">Book Quantity</label>
            <input type="number" name="bookquantity" min="1" max="100" id="Quantity"  required>
            <br>
            <div class="inputclear">
                <div class="add">
                    <input type="submit" value="UPDATE" id="add">
                </div>
                <div class="clear">
                    <input type="reset" value="Clear" id="clear">
                </div>
            </div>
            </form>
            </div>
        
    </div>
    </div>
    
</body>
</html>