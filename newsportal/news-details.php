<?php
include('includes/header.php');

?>


<!-- Page Content -->
<div class="container">


    <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <!-- Blog Post -->
            <?php
            if (isset($_GET['nid']) && $_GET['nid'] != "") {
            $id_post = $_GET['nid'];
            $sql = "select * from posts where id = '$id_post'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
           $row = $res->fetch_assoc();
                $id = $row['id'];
                $title = $row['title'];
                $desc = $row['description'];
                $image = $row['image'];
                $category = $row['category_id'];
                $date = $row['date_post'];
                $sql_cate = "SELECT * FROM category where id='$category'";
                $result_cate = mysqli_query($conn, $sql_cate);
                $row_cate = $result_cate->fetch_assoc();

            ?>

            <div class="card mb-4">

                <div class="card-body">
                    <h2 class="card-title"><?php echo $title;?></h2>
                    <p><b>Category : </b> <a
                                href="category.php?id=<?php echo $category;?>"><?php echo $row_cate['title'];?></a>
<br>
                         Posted on </b><?php echo $date;?></p>
                    <hr/>

                    <img class="img-fluid rounded"
                         src="<?php echo $image?>"
                         alt="<?php echo $title;?>">
<br> <br>
                    <p class="card-text"><?php echo $desc
                       ?></p>
                    <br> <br>

                </div>
                <div class="card-footer text-muted">


                </div>
            </div>
            <?php } }?>


        </div>

        <!-- Sidebar Widgets Column -->
        <?php include('includes/sidebar.php');?>
    </div>
    <!-- /.row -->
    <!---Comment Section --->

    <div class="row" style="margin-top: -8%">
        <div class="col-md-8">
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form name="Comment" method="post">
                        <input type="hidden" name="csrftoken"
                               value=""/>
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter your fullname"
                                   required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter your Valid email"
                                   required>
                        </div>


                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3" placeholder="Comment"
                                      required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>
            </div>

            <!---Comment Display Section --->

            <?php
            if (isset($_POST['submit'])){
                $full_name = $_POST['name'];
                $email = $_POST['email'];
                $comment = $_POST['comment'];
                $date=date("M d,Y h:i a");
                $sql="insert into comments set id_post='$id_post',full_name='$full_name',message='$comment',date_comment='$date',email='$email'";
                $res = mysqli_query($conn,$sql);
                if ($res){
                    mysqli_close($conn);
                    header("location:news-details.php?nid=$id_post");
                }else{
                    header("location:news-details.php?nid=$id_post");
                }

            }

            $sql_comments="select * from comments where id_post='$id_post'";
            $res_comments=mysqli_query($conn,$sql_comments);
            if ($res_comments->num_rows>0){ ?>
            <h4><?php echo $res_comments->num_rows?> Comments</h4>

            <?php
            while($row=$res_comments->fetch_assoc()){
            $date=$row['date_comment'];
            $message=$row['message'];
            $name=$row['full_name'];
            ?>
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="images/usericon.png" alt="">
                <div class="media-body">
                    <h5 class="mt-0"><?php echo $name;?> <br/>
                        <span style="font-size:11px;"><b>at</b> <?php echo $date;?></span>
                    </h5>

                    <?php echo $message;?>            </div>
            </div>
            <?php  }} ?>

        </div>
    </div>
</div>


<?php include('includes/footer.php'); ?>

