<?php 
require_once '../controllers/url.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../assets/css/login.css" rel="stylesheet" /> -->
    <title>Login</title>
    <style>
        *{
            box-sizing: border-box;
        }
        .login-section{
            width:1024px;
            height: 750px;
            border-right:1px solid darkgreen;
            border-left:1px solid darkgreen;
            margin:0px auto;
            background-color:rgba(0,255,0,0.1);
            border-top:1px solid darkgreen;
        }
        .login-section .login-btn{
            width:500px;
            margin:10px auto 0px;
            text-align: center;
            display: flex;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            overflow: hidden;
        }
        .login-section .login-btn button{
            width:100%;
            font-size:25px;
            text-align: center;
            background-color: rgba(0, 255, 0, 0.2);
            border:none;
            color:#00ff80;
            cursor:pointer;
            padding:10px 12px;
           
            
        }
        .login-section .login-btn button:hover{
            background-color: rgba(0, 255, 0, 0.3);
        }
        #login-page{
            width:500px;
            height:auto;
            margin:0px auto;
            border:1px solid darkgreen;
            padding:10px 0px 35px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }
        /*login form css */
        #login-page #login-form {
            display:flex;
            flex-direction: column;
        }
        #login-page #login-form .form-item{
            display:flex;
            flex-direction: row;
            color:#00ff80;
            margin-top:30px;
            padding:0px 10px;
        }
        #login-page #login-form .form-item label{
            width:200px;
            padding:10px;
        }
        #login-page #login-form .form-item input{
            width:100%;
            background-color: rgba(0, 155, 0, 0.3);
            border:none;
            border-radius: 7px;
            color:#00ff80;
            font-size:14px;
        }
        .signin-btn{
            padding:10px;
        }
        #login-page #login-form .signin-btn button{
            float:right;
            padding:10px 14px;
            background-color: rgba(0, 255, 0, 0.4);
            border:none;
            border-radius: 8px;
            color:#00ff80;
            font-size:large;
            cursor: pointer;
        }
        #login-page #login-form .signin-btn button:hover{
            background-color: rgba(0, 255, 0, 0.5);
        }
        /* signup css */
        #login-page #register-form {
            display:flex;
            flex-direction: column;
        }
        #login-page #register-form .form-item{
            display:flex;
            flex-direction: row;
            color:#00ff80;
            margin-top:30px;
            padding:0px 10px;
        }
        #login-page #register-form .form-item label{
            width:200px;
            padding:10px;
        }
        #login-page #register-form .form-item input{
            width:100%;
            background-color: rgba(0, 155, 0, 0.3);
            border:none;
            border-radius: 7px;
            color:#00ff80;
            font-size:14px;
        }
        .signun-btn{
            padding:10px;
        }
        #login-page #register-form .signun-btn button{
            float: right;
            padding:10px 14px;
            background-color: rgba(0, 255, 0, 0.4);
            border:none;
            border-radius: 8px;
            color:#00ff80;
            font-size:large;
            cursor: pointer;
        }
        #login-page #register-form .signun-btn button:hover{
            background-color: rgba(0, 255, 0, 0.5);
        }
        .errorMsg{
            background-color:#ff4242;
            color:white;text-align:center;
            padding:3px;width:300px;margin:10px auto;
            display:flex;justify-content:space-between;padding:8px;
            cursor: pointer;
        }
        @media screen and (max-width:640px) {
            .login-section{
                width:100%;
                margin:0px;
            }
            #login-page{
                width:100%;

            }
          

        }
    </style>
</head>
<body>

    <?php require_once '../templates/header.php';?>
    

    <div class="login-section">
        <div class="login-btn">
            <button onclick="hideSignUp()">Login</button>
            <button onclick="hideLogin()">Register</button>
        </div>
        <div id="login-page">
            <?php if(isset($_GET['error'])): ?>
                <p id="errorMSG1" class="errorMsg"><span>Incorrect email or password!</span><button onclick="hideErrorMessage1()">&times;</button></p>
            <?php endif; ?>
            <?php if(isset($_GET['noEntry'])): ?>
                <p id="errorMSG2" class="errorMsg"><span>Returned empty!</span><button onclick="hideErrorMessage2()">&times;</button></p>
            <?php endif; ?>
            <form id="login-form" action="<?=url('controllers/SignUpController.php')?>" method="POST">
                <div class="form-item">
                    <label for="email">Email or Username</label>
                    <input type="text" name="email" id="email" placeholder="Enter email or username" />
                </div>
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" />
                </div>
                <div class="signin-btn">
                    <button name="signin" type="submit">Login</button>
                </div>
            </form>
            <form style="display: none;" id="register-form" action="<?=url('controllers/SignUpController.php')?>" method="POST">
                <div class="form-item">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" placeholder="Enter name" />
                </div>
                <div class="form-item">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter email" />
                </div>
                <div class="form-item">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter phone" />
                </div>
                <div class="form-item">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" placeholder="Enter address" />
                </div>
                <div class="form-item">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter password" />
                </div>
                <div class="form-item">
                    <label for="confirm_password">Confirm password</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm password" />
                </div>
                <div class="signun-btn">
                    <button name="signup" type="submit">Register</button>
                </div>
            </form>
        </div>
    </div>


    <?php require_once '../templates/footer.php';  ?>

    <script>
        let loginForm = document.getElementById('login-form');
        let registerForm = document.getElementById('register-form');
        let firstPassword = document.getElementById('password');
        let confirmPassword = document.getElementById('confirm_password');

        function passwordNotMatch(){
            if(firstPassword.textContent !== confirmPassword.textContent){
            document.getElementById('errors').textContent = "Password don't match!";
            }
        }

        let msg1 = document.getElementById('errorMSG1');
        let msg2 = document.getElementById('errorMSG2');

        function hideErrorMessage1(){
            msg1.style.display = "none";

        }
        function hideErrorMessage2(){
            msg2.style.display = "none";
        }
       

        function hideLogin(){
            console.log("clicked");
            loginForm.style.display = "none";
            registerForm.style.display = "block";
        }
        function hideSignUp(){
            loginForm.style.display = "block";
            registerForm.style.display = "none";
        }
    </script>
</body>
</html>

