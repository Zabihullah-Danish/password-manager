<?php 
// session_start();
require '../controllers/loader.php';
if(!isset($_SESSION['authenticated'])){
    header('location:'.url('auth/login.php'));
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/content.css" rel="stylesheet" />
    <title>Adding New Password</title>
    <style>
        *{
            box-sizing: border-box;
        }
        
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
    <?php if(isset($_SESSION['authenticated'])): ?> 
    <div class="content">
        <div class="add-new">

            <?php if(isset($_GET['errors'])): ?>
                <p id="errors" style="background-color:red;text-align:center;color:lightblue;padding:4px;width:fit-content;margin:10px auto;border-radius:5px;">All the fields are required to fill.</p>
            <?php endif; ?>
            <form id="password" name="adding_new_password" action="<?=url('controllers/PasswordController.php')?>" onsubmit="return validateForm()" method="POST">
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>">
                <div class="form-item">
                    <label for="site_name">Site name</label>
                    <input type="text" name="site_name" id="site_name" placeholder="Enter site name" required />
                </div>
                <span id="site_name_error"></span>
                <div class="form-item">
                    <label for="url">URL</label>
                    <input type="text" name="url" id="url" placeholder="https://google.com" required />
                </div>
                <div class="form-item">
                    <label for="username">Usename</label>
                    <input type="text" name="username" id="username" placeholder="Enter username or email" required />
                </div>
                <div class="form-item">
                    <label for="pass">Password</label>
                    <input type="text" name="pass" id="pass" placeholder="Enter your password" required />
                </div>
                <div class="save-btn">
                    <button id="save" name="save" type="submit">Save</button>
                </div>
               
            </form>
        </div>
    </div>
    <?php endif; ?>

    <?php require_once '../templates/footer.php' ?>

    <script>
        function validateForm(){
            let siteName = document.forms["adding_new_password"]["site_name"];
            if(siteName == null || siteName == ""){
                alert('name field is rerquied');
                return false;
            }
        }
    </script>
    
</body>
</html>
