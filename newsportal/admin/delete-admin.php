<?php
include "../config/constants.php";

$id = $_GET['id'];
$del = mysqli_query($conn,"delete from admin where id = '$id'");
if($del)
{
    $_SESSION['admin'] = "<span style='color: #2ed573'>admin is deleted</span>";
    header("location:manage-admin.php");
    exit;
}
else
{
    $_SESSION['admin'] = "<span style='color: #2ed573'>admin is not deleted</span>";
    header("location:manage-admin.php");
}
