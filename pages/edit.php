<?php

require '../controllers/loader.php';
require '../controllers/dbconnection.php';

if(isset($_GET['passID'])){
    $passID = $_GET['passID'];

    $sql = "SELECT * FROM passwords WHERE ID = '$passID'";
    $result = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($result);
    // echo "<pre>";
    // print_r($data);
    // exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/content.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        #password{
            margin:20px;
            display:flex;
            flex-direction: column;
            border:1px solid darkgreen;
            padding:5px;
            border-radius: 8px;
        }
        #password .form-item{
            display: flex;
            flex-direction: row;
        }
        #password .form-item label{
            width:200px;
            color:#00ff40;
            padding:10px;
        }
        #password .form-item input{
            width:100%;
            padding:10px;
            background-color:rgba(0, 255, 0, 0.2);
            margin-top:5px;
            color:#00ff40;
            border:none;
            border-radius: 8px;
        }
        #save{
            margin-top:10px;
            padding:10px 12px;
            float:right;
            background-color: rgba(0, 255, 0, 0.5);
            border:none;
            border-radius: 7px;
            color:#00ff40;
            cursor:pointer;
        }
    </style>
</head>
<body>

    <?php require_once '../templates/header.php' ?>
    <?php require_once '../templates/navbar.php' ?>
    
    <div class="content">
        <div class="add-new">
            <div style="display:flex;justify-content:flex-end;padding:5px 20px;">
                <button onclick="back()" style="background-color:#00a400;color:#00ff40;border:none;border-radius:5px;padding:4px;cursor:pointer;">Back</button>
            </div>
            
            <p id="errors"></p>
            <form id="password" action="<?=url('controllers/PasswordController.php?passID='.$data['ID'])?>" method="POST">

                <div class="form-item">
                    <label for="site_name">Site name</label>
                    <input type="text" name="site_name" id="site_name" placeholder="Enter site name" value="<?=$data['site_name']?>" required />
                </div>
                <div class="form-item">
                    <label for="url">URL</label>
                    <input type="text" name="url" id="url" placeholder="https://google.com" value="<?=$data['url']?>" requried />
                </div>
                <div class="form-item">
                    <label for="username">Usename</label>
                    <input type="text" name="username" id="username" placeholder="Enter username or email" value="<?=$data['username']?>" required />
                </div>
                <div class="form-item">
                    <label for="pass">Password</label>
                    <input type="text" name="pass" id="pass" placeholder="Enter your password"  value="<?=$data['password']?>" required />
                </div>
                <div class="save-btn">
                    <button id="save" name="update" type="submit">Update</button>
                </div>
               
            </form>
        </div>
    </div>

    <?php require_once '../templates/footer.php' ?>

    <script>
        let successMsg = document.getElementById('successMsg');
        let siteName = docuemnt.getElementById('site_name');

        function hideMsg(){
            successMsg.style.display = "none";
        }
        function back(){
            window.history.back();
        }
    </script>
</body>
</html>
