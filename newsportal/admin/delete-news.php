<?php
include '../config/constants.php';
$id = $_GET['id'];
$sql = "delete from posts where id ='$id'";
$res = mysqli_query($conn, $sql);
if ($res) {
    $_SESSION['admin'] = "deleted";
    header("location:manage-news.php");
} else {
    $_SESSION['admin'] = " not deleted";
    header("location:manage-news.php");
}