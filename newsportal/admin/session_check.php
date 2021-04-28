<?php
//session_start();

if (! isset ( $_SESSION ['admin_id'] )) {
    $_SESSION['login_failed']=" you must login first";
    header ( "location:login_admin.php" );
}
