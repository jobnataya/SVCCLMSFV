<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/adminlogin.css">
    <title>Admin Login</title>
</head>
<?php
    session_start();
    include("db.connection.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        if (!empty($uname) && !empty($pword)) 
        {
            $query = "SELECT * FROM adminlogin WHERE uname = '$uname' LIMIT 1";
            $result = mysqli_query($conn, $query);

            if($result){
                if ($result && mysqli_num_rows($result)>0) 
                {
                    $user_data = mysqli_fetch_assoc($result);

                    if ($user_data['pword'] == $pword) 
                    {
                        header("Location:adminhome.php");
                        die;
                    }
                }
            }
            echo "<script type = 'text/javascript'> alert ('Wrong Username!')</script>";
        }else
        {
            echo "<script type = 'text/javascript'> alert ('Wrong Password!')</script>";
     
    }   }
?>
<body body style="background:url(IMAGES/books.jpg)">
    <div class="all">
        <div class="header">
            <div class="logo"><img src="IMAGES/Logo.png" alt="Logo svcc"></div>
            <div class="text"><h1>SAINT VINCENT  COLLEGE OF CABUYAO</h1></div>
        </div>
        <div class="center">
        <div class="adminlogin">
            <form method="POST">
                <h2>Admin Login</h2>
                <div class="form">
                <label for="Username">Username</label><br>
                <input type="text" id="adminform" name="uname" ><br>
                <label for="Password">Password</label><br>
                <input type="password" id="adminform" name="pword" ><br>
                <div class="submits">
                <input type="submit" value="Log in" id="submit"><br>
            </div>
                
                <div class="UserLogin">
                <a href="index.php"><p>User Login</p></a>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>