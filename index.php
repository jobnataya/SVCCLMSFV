<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css">
</head>
<?php
session_start();
include("db.connection.php");

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $uname = $_POST['uname'];
    $pword = $_POST['pword'];

    if (!empty($uname) && !empty($pword)) 
    {
        $query = "SELECT * FROM svcclms WHERE uname = '$uname' LIMIT 1 ";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result)> 0)
            {
                $user_data = mysqli_fetch_assoc($result);

                if ($user_data['pword'] == $pword) 
                {
                    header("Location:home.php");
                    die;
                }
            }
        }
        echo "<script type = 'text/javascript'> alert ('Wrong Username!')</script>";
    }else{
        echo "<script type = 'text/javascript'> alert ('Wrong Password!')</script>";
    }
}
?>
<body style="background:url(IMAGES/books.jpg)">
<div class="boddys"style="background:url(IMAGES/books.jpg)">
    <div class="header">
        <div class="logo"><img src="IMAGES/Logo.png" alt="Logo svcc"></div>
        <div class="text"><h1>SAINT VINCENT  COLLEGE OF CABUYAO</h1></div>
    </div>

<div class="article">
        <div class="center">
            <h1>Login</h1>
            <form method="POST">
                <input type="text" placeholder="Username:" id="input" name="uname">
                <br>
                <input type="password" placeholder="Password:" id="input" name="pword">
                <br>
                <a href="" id="forget">Forget Password?</a>
                <br>
                <input type="submit" value="Login" id="submit">
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
</body>
</html>