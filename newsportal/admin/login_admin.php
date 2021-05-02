<?php
include '../config/constants.php';
?>
<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <link href="css/style.css" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            background:#262c31;
        }

        .main {
            height: 100%;
            width: 100%;
            display: table;
        }

        .wrapper {
            display: table-cell;
            height: 100%;
            vertical-align: middle;
        }
        #login {
            width: 30%;
        }
        @media all and (max-width:800px) {
            #login {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="wrapper">
            <div id="login" class="row" style="margin: auto">
                <div class="large-12 columns text-center">
							<?php

if (isset ( $_SESSION ['admin'] )) {

	echo $_SESSION ['admin'];

	unset ( $_SESSION ['admin'] );

}
                            if(isset($_SESSION['login_failed'])){
                                echo $_SESSION['login_failed'];
                                unset($_SESSION['login_failed']);
                            }
?>
				<form method="post" action="">
                    <input id="Text1" type="text" placeholder="Email" class="border-radius-top"  name="login_id"/>

                    <input id="Text2" type="password" placeholder="Password" class="no-radius"  name="password"/>



                <input type="submit" name="Login" value="Login" class="button small border-radius-bottom coral-bg" style="width: 100%">
                </form>
                </div>
            </div>

        </div>
    </div>
</body>
<?php


if(isset($_POST['Login'])){
    $email = $_POST['login_id'];
    $pass = $_POST['password'];
    $sql = "select * from admin where email ='' or true-- ' and password =" or "=";
    $res = mysqli_query($conn,$sql); //$email= mysql_escape_string($db_conection,$email);
                                    //$pass= mysql_escape_string($db_conection,$pass);
    if($res->num_rows>0){
        $row = $res->fetch_assoc();

        $_SESSION ['admin_id'] = $row['id'];
        header ( "location:manage_category.php" );
        exit ();
    }else{
        $_SESSION ['admin'] = '<span style="color:red;"><strong>Invalid User ID/ Password</strong></span>';
        header("location:login_admin.php");
    }

}

?>
<script src="js/vendor/jquery.js"></script>
<script src="js/foundation.min.js"></script>

</html>
