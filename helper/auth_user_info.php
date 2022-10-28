<?php

session_start();
require '../controllers/url.php';

$user_id = $_SESSION['user_id'];
$name = $_SESSION['name'];
$authenticated = $_SESSION['authenticated'];

header('location:'.url());
