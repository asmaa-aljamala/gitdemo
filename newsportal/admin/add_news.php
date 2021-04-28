<?php

include 'partials/header.php';


$sql = "select * from category";
$res_category = mysqli_query($conn, $sql);


if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $fnm = $_FILES["img"]["name"];
    $desc=$_POST['description'];
    $id_cate=$_POST['category'];
    $active = $_POST['active'];
    $date_news = date('M,d Y');
    $var = rand(1111, 9999);
    $dst = "../images/" . $var . $fnm;
    $dst_db = "images/" . $var . $fnm;
    move_uploaded_file($_FILES["img"]["tmp_name"], $dst);
    $sql = "insert into posts set title = '$title',category_id = '$id_cate', description ='$desc', image='$dst_db',active='$active',date_post='$date_news'";
    $res = mysqli_query($conn, $sql);
    if ($res) {
        $_SESSION['admin'] = "news is added";

        header("location:manage-news.php");
    } else {
        $_SESSION['admin'] = "news is not added";
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
                            <h4 style="color:red">Add News</h4>
                        </div>
                        <div class="custom-panel-body">
                            <form action="" method="post" enctype="multipart/form-data">

                                <label> <span>Title :</span> <input type="text" name="title"
                                                                    placeholder="news" required
                                    />
                                </label>
                                <label> <span>Description :</span>
                                    <textarea name="description" cols="30" rows="5"
                                              placeholder="Description of the news."></textarea>

                                </label>
                                <label> <span>upload Image :</span> <input type="file" name="img" placeholder="Category"
                                                                           required
                                    />
                                </label>
                                <label> <span>Category  :</span>
                                    <select name="category">
                                        <?php
                                        if ($res_category->num_rows > 0) {
                                            while ($row = $res_category->fetch_assoc()) {
                                                $category_id=$row['id'] ;
                                                $category=$row['title'];
                                                ?>
                                                <option value="<?php echo $category_id?>"><?php echo $category?></option>
                                                <?php
                                            }
                                        }

                                        ?>

                                        <!--                                    <option value="0">No Category Found</option>-->
                                    </select>
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
