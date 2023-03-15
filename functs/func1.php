<?php
    require_once('../include/dbcon.php');
    session_start();
    if(isset($_POST['conprof'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $email = htmlentities(mysqli_real_escape_string($con,$email));
        $password = htmlentities(mysqli_real_escape_string($con,$password));

        $query = "SELECT * FROM `teacher` WHERE `email` = '$email' and `password` = '$password' ";
        $run = mysqli_query($con,$query);
        $row = mysqli_num_rows($run);
        if($row < 1)
        {
            $_SESSION['login_failed'] = "Username Or Password Wrong";
            $login_failed = $_SESSION['login_failed'];
        }
        else{
            $data = mysqli_fetch_assoc($run);
            $name = $data['name'];
            $uid = $data['id'];
            $_SESSION['email'] = $email;
            $_SESSION['name'] = $name;
            $_SESSION['uid'] = $uid;
            header("location:../teacher/dashboard");
        }
    }
?>