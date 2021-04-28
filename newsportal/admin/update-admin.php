<?php
include "partials/header.php";
include "partials/menu.php";
$id = $_GET['id'];
$sql = "select * from admin where id = '$id'";
$res = mysqli_query($conn, $sql);
if ($res->num_rows > 0) {
    if ($row = $res->fetch_assoc()) {
        $full_name = $row["full_name"];
        $email = $row["email"];

    }
}
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name?>">
                    </td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" value="<?php echo $email?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="">
                        <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>


<?php
include "partials/footer.php";
if (isset($_POST['submit'])) {
    $full_name= $_POST['full_name'];
    $email = $_POST['email'];
    $sql = "update admin set full_name = '$full_name', email='$email' where id ='$id'";
    $edit = mysqli_query($conn, $sql);
    if ($edit){
        header("location:manage-admin.php");
        exit;
    }else{
        echo "failed";
        header("location:manage-admin.php");
    }
}
?>
