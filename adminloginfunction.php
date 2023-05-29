<?php
    include("db.connection.php");

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        
        if (!empty($uname) && !empty($pword)) 
        {
            $sql = "SELECT * FROM adminlogin WHERE uname = '$uname' LIMIT 1";
            $query = mysqli_query($conn, $sql);

            if($query){
                if ($query && mysqli_num_rows($result)>0) 
                {
                    $user_data = mysqli_fetch_assoc($query);

                    if ($user_data['pword'] == $pword) 
                    {
                        header('Location:adminhome.php');
                        exit();
                    }
                }
            }
            echo "<script type = 'text/javascript'> alert ('Wrong Username!')</script>";
        }else
        {
            echo "<script type = 'text/javascript'> alert ('Wrong Password!')</script>";
     
    }   }

    
?>