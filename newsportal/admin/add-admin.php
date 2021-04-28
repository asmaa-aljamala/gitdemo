<?php
include "partials/header.php";
include "partials/menu.php";
?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        <br><br>


        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Email:</td>
                    <td>
                        <input type="email" name="email" placeholder="Your email">
                    </td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>
                        <input type="password" name="password" placeholder="Your Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $sql = "insert into admin set full_name = '$full_name', email='$email',password='$password'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['admin'] = "<span style='color: #2ed573'>admin is added</span>";

      header("location:manage-admin.php");
    } else {
        $_SESSION['admin'] = "<span style='color: red'>admin is not added</span>";
        header("location:manage-admin.php");

    }
}
?>
