<?php
include 'partials/header.php';

if (isset($_POST['add'])) {
    $title = $_POST['category'];
    $fnm = $_FILES["img"]["name"];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $var = rand(1111, 9999);
    $dst = "../images/" . $var . $fnm;
    $dst_db = "images/" . $var . $fnm;
    move_uploaded_file($_FILES["img"]["tmp_name"], $dst);
    $sql = "insert into category set title = '$title', pic='$dst_db',featured='$featured',active='$active'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['admin'] = "category is added";

        header("location:manage_category.php");
    } else {
        $_SESSION['admin'] = "category is not added";
        header("location:manage_category.php");

    }
}
?>
<div class="row">
    <?php include 'partials/menu.php'; ?>
    <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">

        <div id="dashboard">

            <div class="row">
                <div class="large-12 columns">
                    <div class="custom-panel">
                        <div class="custom-panel-heading">
                            <h4 style="color:red">Add Category</h4>
                        </div>
                        <div class="custom-panel-body">
                            <form action="" method="post" enctype="multipart/form-data">

                                <label> <span>Category :</span> <input type="text" name="category"
                                                                       placeholder="Category" required
                                    />
                                </label>
                                <label> <span>upload Image :</span> <input type="file" name="img" placeholder="Category"
                                                                           required
                                    />
                                </label>
                                <label> <span>Featured :</span>
                                    <input type="radio" name="featured" value="Yes" checked> Yes
                                    <input type="radio" name="featured" value="No"> No
                                </label>
                                <label> <span>Active :</span> <input type="radio" name="active" value="Yes" checked> Yes
                                    <input type="radio" name="active" value="No"> No
                                </label>
                                <!--<label><span>Content </span> <textarea placeholder="Content" name="content" required></textarea></label>-->
                                <label><span>&nbsp;</span><input type="submit" name="add"
                                                                 class="button tiny radius coral-bg right" value="Add"></label>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker();
    });
</script>
<script src="js/foundation.min.js"></script>
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>

<script src="js/plugins/morris/morris.js"></script>
<script src="js/todos.js"></script>
<script src="js/menu.js"></script>
<script>
    $(document).foundation();
</script>
<script src="js/morris-demo.js"></script>


</body>
</html>
