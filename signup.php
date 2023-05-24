<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/signup.css">
    <title>Sign up</title>
</head>
<?php
    session_start();

    include("db.connection.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $bday = $_POST['bday'];
        $gender = $_POST['gender'];
        $year = $_POST['year'];
        $idnumber = $_POST['idnumber'];
        $department = $_POST['department'];
        $address = $_POST['address'];
        $contractnumber = $_POST['contactnumber'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];
        $usertype = $_POST['usertype'];

        if (!empty($uname) && !empty($pword)) {
            
            $query = "INSERT INTO svcclms (`fname`,`mname`,`lname`,`bday`,`gender`,`year`,`idnumber`,`department`,`address`,`usertype`,`contactnumber`,`uname`,`pword`) values ('$fname','$mname','$lname','$bday','$gender','$year','$idnumber','$department','$address','$usertype','$contractnumber','$uname','$pword')";

            mysqli_query($conn, $query);

            echo "<script type = 'text/javascript'> alert ('Successfully Register')</script>";
        }
        else{
            echo "<script type = 'text/javascript'> alert ('Please Fill up all registration form')</script>";
        }
    }
?>
<body style="background:url(IMAGES/books.jpg)">
    <div class="all">
        <div class="header">
            <div class="logo"><img src="IMAGES/Logo.png" alt="Logo svcc"></div>
        <div class="text"><h1>SAINT VINCENT  COLLEGE OF CABUYAO</h1></div>
        </div>
        <div class="article">
            <form method="POST">
            <div class="center">
            <div class="left">
                <div class="BItext">
                    <h2>Basic Information</h2>
                </div>
                <div class="FNname">
                    <h3>Full Name </h3>
                </div>
                
                    <input type="texts" placeholder="First Name:" id="inputs" name="fname">
                    <input type="text" placeholder="Middle Name:" id="inputs" name="mname">
                    <input type="text" placeholder="Last Name" id="inputs" name="lname">
                    <br>
                    <label for="birthday" id="bot">Birthday:</label>
                     <input type="date" id="birthday" name="bday">
                     <br>
                        
                     <label for="gender" id="bot">Gender:</label>
                            <select id="gender" name="gender" >
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Rather not say">Rather not say</option>
                            <input type="submit" id="submit">
                </div>
            <div class="centers">
                <div class="BItextc">
                    <h3>Student Basic Information</h3>
                    </div>
                        <label for="Year" id="textcc" >Year:</label>
                        <input type="text" placeholder="Year" id="inputc" name="year"><br>
                        <label for="Id#" id="textcc">ID Number</label>
                        <input type="text" placeholder="ID#"id="inputc" name="idnumber"> <br>
                        <label for="Department" id="textcc">Department:</label>
                        <select name="department" id="department">
                            <option value="BSIT">BSIT</option>
                            <option value="BSED">BSED</option>
                            <option value="BSCRIM">BSCRIM</option>
                            <option value="BSHRM">BSHRM</option>
                        </select> <br>
                        <label for="Address" id="textcc">Address:</label>
                        <input type="text" placeholder="Address:"id="inputc" name="address"><br>
                        <label for="Contact Number" id="textcc">Contact  Number:</label>
                        <input type="text" placeholder="ex/ 0955-297-8471"id="inputc" name="contactnumber"><br>
                        <br>
                        <div class="login">
                        <a href="index.php" id="login"><p>Login</p></a>
                    </div>
            </div>
            <div class="right">
                <div class="BItextb">
                    <h3>User Account Information</h3>
                </div>
                    <label for="Usertype" id="usertype">UserType:</label>
                    <select name="usertype" id="usertype">
                        <option value="student">Student</option>
                    </select><br>
                    <label for="Username" id="usertype">Username:</label>
                    <input type="text" placeholder="Username:" id="inputr" name="uname"><br>
                    <label for="Password"id="usertype">Password:</label>
                    <input type="password" placeholder="Password:" id="inputr" name="pword">
            </div>
        </form>
            </div>
        </div>
</body>
</html>