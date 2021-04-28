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

            if (isset($_GET['id']) && $_GET['id'] != "") {
            $id_category = $_GET['id'];
            $sql = "select * from posts where category_id = '$id_category'";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];
                $desc = $row['description'];
                $image = $row['image'];
                $category = $row['category_id'];
                $date= $row['date_post'];
                $sql_cate = "SELECT * FROM category where id= '$category'";
                $result_cate = mysqli_query($conn,$sql_cate);
                $row_cate=$result_cate->fetch_assoc();



            ?>
            <h1><?php echo $row_cate['title'];?> News</h1>
            <div class="card mb-4">
                <img class="card-img-top" src="<?php echo $image;?>"
                     alt="">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $title ;?></h2>

                    <a href="news-details.php?nid=<?php echo $id;?>" class="btn btn-primary">Read
                        More &rarr;</a>
                </div>
                <div class="card-footer text-muted">
                    Posted on <?php  echo $date;?>

                </div>
            </div>
            <?php  }} }?>

        </div>

        <!-- Sidebar Widgets Column -->
        <?php include('includes/sidebar.php'); ?>
    </div>
    <!-- /.row -->

</div>

<!-- Footer -->
<?php include('includes/footer.php'); ?>

