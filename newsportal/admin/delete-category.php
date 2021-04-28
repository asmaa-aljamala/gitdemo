<?php
include '../config/constants.php';
$id = $_GET['id'];
$sql = "delete from category where id = '$id'";
$res = mysqli_query($conn,$sql);
if ($res){
$_SESSION['admin'] = "deleted";
header("location:manage_category.php");
}else{
    $_SESSION['admin'] = " not deleted";
    header("location:manage_category.php");
}