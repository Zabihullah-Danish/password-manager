<?php
session_start();
require_once 'dbconnection.php';
require_once 'url.php';

if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = md5($_POST['password']);

    $sql = "INSERT INTO users (name,email,phone,address,password) VALUES ('$name','$email','$phone','$address','$password')";
    
    if(mysqli_query($con,$sql)){
        $sql = "SELECT * FROM users WHERE name = '$name' AND email = '$email'";
        if($query = mysqli_query($con,$sql)){
            $result = mysqli_fetch_assoc($query);
            // echo "<pre>";
            // print_r($result);
            // exit();
            $_SESSION['user_id'] = $result['ID'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['authenticated'] = true;
            header('location:'.url());
        }
        // header('location:'.url());
        
    }else{
        header('location:'.url('auth/login.php?noEntry=1'));
    }
    
}

if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $query = mysqli_query($con,$sql);
    $result = mysqli_fetch_assoc($query);
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
    // exit();
    if($result){
        $_SESSION['name'] = $result['name'];
        $_SESSION['user_id'] = $result['ID'];
        $_SESSION['authenticated'] = true;
        header('location:'.url());
    }else{
        header('location:'.url('auth/login.php?error=1'));
    }
    

}