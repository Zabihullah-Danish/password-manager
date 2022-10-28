<?php 
    
    if(!isset($_SESSION['authenticated'])){
        header('location:'.url('auth/login.php'));
    }

    // echo "<pre>";
    // print_r($result);
    // // exit();
?>
<head>
    <style>
        *{
            box-sizing:border-box;
        }
        .content {
            width:1024px;
            min-height:750px;
            border-left:1px solid darkgreen;
            border-right:1px solid darkgreen;
            background-color:rgba(0,255,0,0.1);
            margin:0px auto;
            border-top:1px solid green;
            /* color:#35f239; */
        }

        .content-items {
            padding:5px;
            
        }

        .content-items table{
            width:100%;
            color:#80ff80;
            border-collapse:collapse;
            border-radius:5px;
            
        }
        .content table thead,tbody,tr,th,td{
            border:1px solid green;

        }
        .content-items table thead tr{
            text-align:left;
            background-color:rgba(0,230,0,0.4);
        }
        .content-items table thead tr th{
            padding:5px;
        }
        .content-items table tbody tr td{
            padding:5px;
        }
        .content-items table tbody tr:hover{
            background-color:rgba(0,255,0,0.1);
        }
        .content-items table tr td .action{
            text-decoration:none;
            color:#80ff00;
            font-size:12px;
            background-color: #008c00;
            padding:4px;
            border-radius: 2px;
        }
        
        .successMsg {
            color:#80ff80;
            display:flex;justify-content:space-between;
            width:300px;
            margin:10px auto;
            border:1px solid green;
            padding:5px;
            border-radius: 5px;
            background-color: rgba(0, 255, 0, 0.5);

        }
        #link{
            color:#80ff80;
            text-decoration: none;
        }
        /* #deleted{
            position:absolute;
            width:300px;
            padding:10px;
            background-color: rgba(0, 255, 0, 0.4);
            color:#80ff80;
            top:0%;
            left:0px;
            text-align: center;
            margin:0px auto;
        } */
        .alert{
            animation-name:hide;
            animation-duration: 4s;
            animation-fill-mode: forwards;
            background-color:rgba(0, 255, 0, 0.4);
            position:absolute;
            color:white;
            border-radius:10px;
            width:auto;
            padding:8px;
            margin-left:auto;
            margin-right:auto;
            display:block;
            top:0;
            left:0;
            text-align: center;
        }

        @keyframes hide{
            0%{
                left:-20px;
                opacity:0.4;
            }
            
            50%{
                opacity:1;
                left:10px;
                
            }
            75%{
                left:-5px;
            }
            100%{
                left:-10px;
                opacity:0;
            }
        }
        @media screen and (max-width:640px) {
            .content{
                width:100%;
                margin:0;
            }

        }
        @media screen and (max-width:768px) {
            .content{
                width:100%;
                margin:0;
            }
        }

    </style>
</head>
<div class="content">
    <?php if(isset($_GET['deleted'])): ?>
        <p id="deleted2" class="alert">Record Deleted Successfully</p>
    <?php endif; ?>
    <?php if(isset($_GET['success'])): ?>
        <p id="successMsg" class="alert">
            <span style="padding:5px;">Record Added Successfully</span>
            <button onclick="hideMsg()" style="border:none;background-color:transparent;color:#80ff80;cursor:pointer;padding:5px;">&times;</button>
        </p>
    <?php endif; ?>
    <?php if(isset($_GET['updated'])): ?>
        <p id="successMsg1" class="alert">
            <span style="padding:5px;">Record Updated Successfully</span>
            <button onclick="hideMsg1()" style="border:none;background-color:transparent;color:#80ff80;cursor:pointer;padding:5px;">&times;</button>
        </p>
    <?php endif; ?>
    <div class="content-items">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Site name</th>
                    <th>URL</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($obj = mysqli_fetch_assoc($result)): ?>
                    <?php $ID = $obj['ID']; ?>
                <tr>
                    <td><?=$obj['ID']?></td>
                    <td><?=$obj['site_name']?></td>
                    <td><a id="link" href="<?=$obj['url']?>" target="_blank"><?=$obj['url']?></a></td>
                    <td><?=$obj['username']?></td>
                    <td><?=$obj['password']?></td>
                    <td id="actions">
                        <a class="action" href="<?php echo url('pages/edit.php?passID='.$obj['ID']); ?>">Edit</a>
                        <form onsubmit="return confirm('Are sure to delete the record?')" style="display:inline" action="<?php echo url('controllers/PasswordController.php?passID='.$obj['ID']) ?>" method="POST">
                            <input style="border:none;cursor:pointer;" type="submit" class="action" name="delete" value="Delete" />
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
                
            </tbody>
        </table>  
    </div>
</div>
    <script>
        let successMsg = document.getElementById('successMsg');
        let successMsg1 = document.getElementById('successMsg1');
        // let siteName = docuemnt.getElementById('site_name');

        function hideMsg(){
            successMsg.style.display = "none";
            successMsg1.style.display = "none";
        }
        function hideMsg1(){
           
            successMsg1.style.display = "none";
        }
    </script>