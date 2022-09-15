<?php 
require 'database.php';
session_start();
if(isset($_POST) && !empty($_POST)){

    if($_POST['email'] == ''){
        $_SESSION['email'] = '<span style="color: red">Email address is Required!</span>';
    }
    if($_POST['password'] == ''){
        $_SESSION['password'] = '<span style="color: red">Password is Required!</span>';
    }

    if(!empty($_SESSION)){
        header("location: index.php");
        die;
    }
    else{
        $query = $conn->query("SELECT * FROM users WHERE email = '".$_POST['email']."' and password = '".$_POST['password']."'");

        if($query->num_rows > 0){
            if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on'){
                $hour = time() + 3600 * 24 * 30; // for one month. 
                setcookie('email', $_POST['email'], $hour);
                setcookie('password', $_POST['password'], $hour);
            }

            $_SESSION['userdata'] = $query->fetch_assoc();
            header('location: dashboard.php');
            die;
        }
        else{
            $_SESSION['not_found'] = '<span style="color: red">Wrong Crendential!</span>';
            header("location: index.php");
            die;
        }
    }
}
header("location: index.php");
?>