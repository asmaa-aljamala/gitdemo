<?php 

include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <!-- Blog Post -->
<?php


        $sql = "SELECT * FROM posts where active='yes'";
        $result = mysqli_query($conn,$sql);
        if ($result->num_rows>0){
       while ($row=$result->fetch_assoc()) {
          $id= $row['id'];
          $id_category= $row['category_id'];
          $image= $row['image'];
          $title= $row['title'];
          $date= $row['date_post'];
           $sql_cate = "SELECT * FROM category where id= '$id_category'";
           $result_cate = mysqli_query($conn,$sql_cate);
           $row_cate=$result_cate->fetch_assoc();



?>

          <div class="card mb-4">
 <img class="card-img-top" src="<?php  echo $image;?>" alt="">
            <div class="card-body">
              <h2 class="card-title"><?php echo $title;?></h2>
                 <p><b>Category : </b> <a href="category.php?catid=<?php echo $id_category?>"><?php echo $row_cate['title'];?></a> </p>
       
              <a href="news-details.php?nid=<?php echo $id?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $date;?>
           
            </div>
          </div>
<?php }} ?>
       

        </div>

        <!-- Sidebar Widgets Column -->
      <?php include('includes/sidebar.php');?>
      </div>

    </div>


    <!-- Footer -->
      <?php include('includes/footer.php');?>

