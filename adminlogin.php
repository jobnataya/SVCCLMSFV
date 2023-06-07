<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/adminloginn.css">
    <title>Admin Login</title>
</head>

<body body style="background: url(IMAGES/IMG_2764.JPG) no-repeat; background-size: cover;">
    <div class="all">
        <div class="header">
            <div class="logo"><img src="IMAGES/Logo.png" alt="Logo svcc"></div>
            <div class="text">
                <h1>SAINT VINCENT COLLEGE OF CABUYAO</h1>
            </div>
        </div>
        <div class="center">
            <div class="adminlogin">
                <form action="adminlogin.php" method="post">
                    <h2>Admin Login</h2>
                    <div class="form">
                        <input type="hidden" name="action" value="profile">
                        <label for="Username">Username</label><br>
                        <input type="text" id="adminform" name="uname" required><br>
                        <label for="Password">Password</label><br>
                        <input type="password" id="adminform" name="pword" required><br>
                        <div class="submits">
                            <input type="submit" value="Log in" id="submit" name="login"><br>
                        </div>

                        <div class="UserLogin">
                            <a href="index.php">
                                <p>User Login</p>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    session_start();
    include("db.connection.php");
    if (isset($_POST['login'])) {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $select = mysqli_query($conn, "SELECT * FROM adminlogin WHERE uname = '$uname' AND pword = '$pword'");


        $row = mysqli_fetch_array($select);

        if (is_array($row)) {
            $_SESSION["uname"] = $row['uname'];
            $_SESSION["pword"] = $row['pword'];
        } else {
            echo '<script type = "text/javascript">';
            echo 'alert("Invalid Username or Password"); ';
            echo 'window.location.href ="adminlogin.php"';
            echo '</script>';
        }
    }
    if (isset($_SESSION["uname"])) {
        header("Location:adminhome.php");
    }
    ?>
</body>

</html>