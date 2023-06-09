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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/dashboard.css">
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
                <li class="cdashboard"><a href="dashboard.php"  ><i class="fa-solid fa-table-columns"></i>Dashboard</a></li>
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
        <h1>Dashboard</h1>  
        <div class="allddown">
        <div class="numstu">
           <div class="text">
           <h1>Number of Students</h1>
           </div>
           <div class="content">
            <h1>50</h1>
           </div>
        </div>  

        <div class="numbooks">
            <div class="text">
            <h1 id="">Number of books</h1>
            </div>
            <div class="content">
            <?php
        include("db.connection.php");
            $sql = "SELECT * FROM addbooks";

            $result = $conn->query($sql);

        // Check if the query returned any rows
        if ($result->num_rows > 0) {
            // Count the number of rows (i.e., number of students)
            $numStudents = $result->num_rows;

            // Display the number of students registered
            echo  "<h1> $numStudents </h1>";
        } else {
            echo "No available books";
        }

        // Close the database connection
        $conn->close();
        ?>
            </div>
        </div>
        
        <div class="numissue">
            <div class="text">
            <h1>Number of issued books</h1>
            </div>
            <div class="content">
            <?php
        include("db.connection.php");
        $sql = "SELECT * FROM issued_books";

            $result = $conn->query($sql);

        // Check if the query returned any rows
        if ($result->num_rows > 0) {
            // Count the number of rows (i.e., number of students)
            $numStudents = $result->num_rows;

            // Display the number of students registered
            echo  "<h1> $numStudents </h1>";
        } else {
            echo "No issue books found.";
        }

        // Close the database connection
        $conn->close();
        ?>
            </div>
        </div>

          <div class="numreturn">
            <div class="text">
            <h1>Number of Return Books</h1>
            </div>
            <div class="content">
            <?php
        include("db.connection.php");
        $sql = "SELECT * FROM returnedhistory";

            $result = $conn->query($sql);

        // Check if the query returned any rows
        if ($result->num_rows > 0) {
            // Count the number of rows (i.e., number of students)
            $numStudents = $result->num_rows;

            // Display the number of students registered
            echo  "<h1> $numStudents </h1>";
        } else {
            echo "No Returned  books.";
        }

        // Close the database connection
        $conn->close();
        ?>
            </div>
          </div>
          </div>
          </div>
    </div>
    </div>
    
</body>
</html>