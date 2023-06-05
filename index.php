<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>

<body style="background:url(IMAGES/books.jpg)">
<div class="boddys"style="background:url(IMAGES/books.jpg)">
    <div class="header">
        <div class="logo"><img src="IMAGES/Logo.png" alt="Logo svcc"></div>
        <div class="text"><h1>SAINT VINCENT  COLLEGE OF CABUYAO</h1></div>
    </div>

<div class="article">
        <div class="center">
            <h1>Login</h1>
            <form method="post" action="index.php"> 
                <input type="text" placeholder="Username:" id="input" name="uname">
                <br>
                <input type="password" placeholder="Password:" id="input" name="pword">
                <br>
                <br>
                <input type="submit" value="Login" id="submit" name="login">
                <br>
                <p id="Signup">Don't have an Account? <a href="signup.php" id="sign" >Sign up</a></p>
            </form>
            <a href="adminlogin.php" id="admin">For Admin</a>
        </div>
</div>

    <div class="footer">
        <div class="text1">The Library Management System is a significant project undertaken by students enrolled in the Fundamentals of Database Systems course at Saint Vincent College of Cabuyao.</div>
        <div class="text2">It serves as a practical application of the database concepts and techniques learned throughout the course, allowing students to gain hands-on experience in designing and implementing a functional library management system.</div>
        <div class="text3">The project aims to address the needs and challenges faced by libraries in efficiently managing their resources, including books, patrons, and borrowing records, through the utilization of a well-designed and optimized database system.</div>
        <div class="text4">By developing the Library Management System, students will learn how to model complex relationships between entities, design appropriate database schemas, implement data manipulation operations, and ensure data integrity and security within the system.</div>
        <div class="text5">This project serves as a culmination of the students' knowledge and skills in database systems, showcasing their ability to create a practical solution that can enhance the operations and services of a library.</div>
    </div>
</div>
<?php
    session_start();
    include("db.connection.php");
    if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $select = mysqli_query($conn, "SELECT * FROM svcclms WHERE uname = '$uname' AND pword = '$pword'");


        $row = mysqli_fetch_array($select);

        if (is_array($row)) {
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["pword"] = $row['pword'];
        } else {
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Username or Password"); ';
            echo 'window.location.href ="index.php"';
            echo '</script>';
        }
    }
    if (isset($_SESSION["uname"])) {
        header("Location:studenthome.php");
    }
    ?>
</body>
</html>