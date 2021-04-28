<?php include 'partials/header.php';

$id = $_GET ['id'];

$sql = "select * from category";
$res_category = mysqli_query($conn, $sql);

$sql = "select * from posts where id='$id'";
$res = mysqli_query($conn, $sql);

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $title = $row['title'];
    $descr = $row['description'];
    $image_old = $row['image'];
    $category = $row['category_id'];
    $featured = $row['featured'];
    $active = $row['active'];
} else {
    $_SESSION['admin'] = "admin is not edited";
    header("location:manage-news.php");

}


if (isset($_POST['submit'])) {
    $title = $_POST['news'];
    $desc = $_POST['description'];
    $id_cate = $_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    if (isset( $_FILES["pic"]["name"]) &&  $_FILES["pic"]["name"]!= null){
        $fnm = $_FILES["img"]["name"];
        $var = rand(1111, 9999);
        $dst = "../images/" . $var . $fnm;
        $dst_db = "images/" . $var . $fnm;
        move_uploaded_file($_FILES["img"]["tmp_name"], $dst);
    }else{
        $dst_db =  $image_old;
    }
    move_uploaded_file($_FILES["pic"]["tmp_name"], $dst);
    $sql = "update posts set title = '$title', image='$dst_db', category_id='$id_cate', description='$desc',featured='$featured',
                active='$active' where id ='$id'";
    $edit = mysqli_query($conn, $sql);
    if ($edit) {
        $_SESSION['admin'] = "news is  edited";
        header("location:manage-news.php");
    } else {
        $_SESSION['admin'] = "news is not edited";
        header("location:manage-news.php");
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
                            <h4>Edit News</h4>
                        </div>

                        <div class="custom-panel-body">
                            <form action="" method="post"
                                  enctype="multipart/form-data">
                                <label> <span>Title :</span>
                                    <input type="text" name="news" value="<?php echo $title; ?>"
                                           required="required">
                                </label>
                                <label> <span>Description :</span>
                                    <textarea name="description" cols="30" rows="5"
                                               ><?php echo $descr; ?></textarea>
                                </label>
                                <label> <span>Image1</span>
                                    <input type="file"
                                           name="pic" accept=".jpg, .jpeg,.png"/>
                                </label> <label style="margin: -15px 0; padding: 0;"><span>&nbsp;</span>
                                    <div class="message msgpic1"></div>
                                </label>
                                <div class="clearfix"></div>
                                <label> <span>Image1</span> <img src="<?php echo "../" . $image_old ?>"
                                                                 width="100px" height="90px"/> </label>
                                <br>
                                <label> <span>Category  :</span>
                                    <select name="category">
                                        <?php
                                        if ($res_category->num_rows > 0) {
                                            while ($row = $res_category->fetch_assoc()) {
                                                $category_id = $row['id'];
                                                $category = $row['title'];
                                                ?>
                                                <option value="<?php echo $category_id ?>"><?php echo $category ?></option>
                                                <?php
                                            }
                                        }

                                        ?>

                                        <!--                                    <option value="0">No Category Found</option>-->
                                    </select>
                                </label>
                                <label> <span>Featured :</span>
                                    <input type="radio" name="featured"
                                           value="Yes" <?php if ($featured == "Yes") echo "checked" ?> >Yes
                                    <input type="radio" name="featured"
                                           value="No"<?php if ($featured == "No") echo "checked" ?> > No
                                </label>
                                <label> <span>Active :</span> <input type="radio" name="active"
                                                                     value="Yes" <?php if ($active == "Yes") echo "checked" ?>>
                                    Yes
                                    <input type="radio" name="active"
                                           value="No"<?php if ($active == "No") echo "checked" ?>> No
                                </label>
                                <input type="submit" class="button tiny radius coral-bg right" name="submit"
                                       value="Update Category">
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
<script src="js/foundation.min.js"></script>
<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>
<script src="js/todos.js"></script>
<script src="js/menu.js"></script>
<script>
    $(document).foundation();
</script>
<script src="js/morris-demo.js"></script>
<script>
    $(function () {
        $(".datepicker").datepicker();
    });
</script>
</body>
</html>
