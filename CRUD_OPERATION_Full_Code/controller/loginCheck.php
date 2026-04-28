<?php
session_start();

if(isset($_POST['submit'])){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    if($username == "" || $password == ""){
        echo "null username/password!";
    }else{
        if(isset($_SESSION['user'])){
            if($username == $_SESSION['user']['username'] && $password == $_SESSION['user']['password']){
                $_SESSION['username'] = $username;

                setcookie('status', true, time()+3000, '/');

                header('location: ../view/home.php');
            }else{
                echo "invalid user!";
            }
        }else{
            echo "please signup first!";
        }
    }
}else{
    echo "invalid request! please submit form...";
}
?>