<?php
require 'loader.php';
if(isset($_SESSION['authenticated'])){
    header('location:'.url());
}

if(!isset($_SESSION['authenticated'])){
    header('location:'.url('auth/login.php'));
}