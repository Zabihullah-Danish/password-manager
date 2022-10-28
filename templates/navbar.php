
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/css/navbar.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <title>Document</title>
    <style>
        .container .navbar {
            /* inherite:none; */
            display:flex;
            flex-direction:row;
            justify-content:space-between;
            background-color: rgba(0, 255, 0, 0.3);
            /* padding:0px 20px; */
            width:700px;
            margin:0px auto;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            overflow:hidden;
        }
        .container .navbar .sub-item{
            display: flex;
            flex-direction: row;
        }
        .container .navbar .sub-item .link{
            padding:12px;
            text-decoration: none;
            font-weight: bold;
            color:#00ff40;
            font-family:'Times New Roman', Times, serif;
            /* box-shadow:2px -3px 5px green; */

        }
        .container .navbar .sub-item .link:hover{
            text-shadow:1px 1px 5px blue;
            display: inline-block;
            background-color: rgba(0, 255, 0, 0.1);
        }
        @media screen and (max-width:640px) {
            .container{
                width:100%;
                border:none;
            }
            .container .navbar{
                display: flex;
                flex-direction: column;
                border-top-left-radius: none;
                border-top-right-radius: none;
                margin:0;
            }
            .container .navbar .sub-item{
                display:flex;
                flex-direction:column;
                margin:0px;
                width: 100%;
            }
            .container .navbar .sub-item .link{
                padding-left:10px;
                
            }
        }
        @media screen and (max-width:768px) {
            .container{
                max-width:768px;
                border:none;
            }
            .container .navbar{
                display: flex;
                width:100%;
                justify-content: space-around;
            }
        }
    </style>
    
</head>
<body>
    <?php if(isset($_SESSION['authenticated'])): ?>
    <div class="container">
        <div class="navbar">
            <div class="sub-item">
                <a class="link" href="<?=url()?>">All Passwords</a>
                <a class="link" href="<?=url('pages/addnew.php')?>">Add new</a>
            </div>
            <div class="sub-item">
                <span style="color:#ffffff;padding:12px;color:#00ff40;font-weight:bold;"><?=$_SESSION['name']?></span>
                <a class="link" href="<?=url('auth/logout.php')?>">
                <svg style="width:25px;" xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Log Out</title><path d="M304 336v40a40 40 0 01-40 40H104a40 40 0 01-40-40V136a40 40 0 0140-40h152c22.09 0 48 17.91 48 40v40M368 336l80-80-80-80M176 256h256" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                </a>
            </div>
            
        </div>
    </div>
    <?php endif; ?>
</body>
</html>