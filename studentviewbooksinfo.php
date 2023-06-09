<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Home</title>
   <link rel="stylesheet" href="CSS/studentviewbooksinfo.css">
    <script src="https://kit.fontawesome.com/02acf016b4.js" crossorigin="anonymous"></script>
</head>
<body class="all" style="background:url(IMAGES/books.jpg)">
    <div>
        <div class="header">
            <div class="logo"><img src="IMAGES/Logo.png" alt=""></div>
            <div class="textlogo">
                 <h1> Saint Vincent College of Cabuyao</h1>
                 <div class="logout"><a href="logoutforstudents.php"><p>Logout</p></a></div>
            </div>
        </div>
        <div class="article">
            <div class="leftside">
                <div class="navleft">
                    <ul>
                        <li ><a href="studentprofile.php"><i class="fa-regular fa-user fa-2xl"></i>Profile</a></li>
                        <li><a href="studentviewbooks.php"><i class="fa-solid fa-book fa-2xl"></i>Viewbooks</a></li>
                    </ul>
                </div>
            </div>
            <div class="rightside">
             <?php 
                include("db.connection.php");
                
                if (isset($_POST['submit'])) {
                    $isbn = $_POST['isbn'];
                    $bookname = $_POST['bookname'];
                    $description = $_POST['description'];
            ?>
                    <table>
                        <tr>
                            <th>ISBN</th>
                            <th>Book Name</th>
                            <th>Description</th>
                        </tr>

                        <tr>
                            <td><?php echo $isbn;?></td>
                            <td><?php echo $bookname;?></td>
                            <td><?php echo $description;?></td>
                        </tr>
                    </table>

            
            <?php
                }
            ?>
    </div>
        <div class="footer"></div>
    </div>
</body>
</html>