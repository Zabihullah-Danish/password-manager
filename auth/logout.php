<?php
session_start();
require_once '../controllers/url.php';

unset($_SESSION['name']);
unset($_SESSION['authenticated']);
header('location:'.url('auth/login.php'));



