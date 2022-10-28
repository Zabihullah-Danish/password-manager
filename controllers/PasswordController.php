<?php
// session_start();
require_once 'dbconnection.php';
require_once 'url.php';

// inserting data to passwords
if(isset($_POST['save'])){
    $errors = [];
    if(empty($_POST['site_name']) OR ctype_space($_POST['site_name'])){
        $errors[] = "Site name must filled";
    }else{
        $siteName = $_POST['site_name'];
    }

    if(empty($_POST['url']) OR ctype_space($_POST['url'])){
        $errors[] = "URL field must be filled";
    }else{
        $url = $_POST['url'];
    }
    
    if(empty($_POST['username'])){
        $errors[] = "Username field must be filled";
    }else{
        $username = $_POST['username'];
    }

    if(empty($_POST['pass']) OR ctype_space($_POST['pass'])){
        $errors[] = "Password field must be filled";
    }else{
        $password = $_POST['pass'];
    }
    
    $user_id = $_POST['user_id'];

    if(count($errors) == 0){
        $sql = "INSERT INTO passwords (site_name,url,username,password,user_id) VALUES ('$siteName','$url','$username','$password','$user_id')";
        if(mysqli_query($con,$sql)){
        
        // $_SESSION['success'] = true;
        header('location:'.url('?success=1'));
        }
    }else{
        
        header('location:'.url('pages/addnew.php?errors=1'));
    }
    
}

//updating the current records.

if(isset($_POST['update'])){

    $siteName = $_POST['site_name'];
    $url = $_POST['url'];
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $ID = $_GET['passID'];
    $sql = "UPDATE passwords set site_name = '$siteName', url = '$url', username = '$username', password = '$password'
        WHERE ID = '$ID'";
    if(mysqli_query($con,$sql)){
        header('location:'.url('?updated=1'));
    }
}

//delete the specified record
if(isset($_POST['delete'])){
    if(isset($_GET['passID'])){
        $ID = $_GET['passID'];
        $sql = "DELETE FROM passwords WHERE ID = '$ID'";
        if(mysqli_query($con,$sql)){
            header('location:'.url('?deleted=1'));
        }
    }
}

//retrieve the autheticated user passwords.
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    // echo $user_id;
    // exit();
    $sql = "SELECT * FROM passwords WHERE user_id = '$user_id'";
    if($result = mysqli_query($con,$sql)){

    }else{
        echo "NOT FOUND";
        exit();
    }
    
    }



