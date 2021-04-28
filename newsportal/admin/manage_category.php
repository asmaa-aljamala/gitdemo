<?php

include 'partials/header.php';

?>
<div class="row">
    <?php include 'partials/menu.php'; ?>
    <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        <div class="row">
            <div class="large-10 columns">
                <div class="page-name">
                    <h3 class="left">Welcome To Our Dashboard</h3>
                    <div class="clearfix"></div>


                    <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
                        <div class="row">
                            <div class="large-10 columns">
                                <div class="page-name">
                                    <div class="clearfix"></div>
                                    <a class="button tiny radius success lable js-open-modal btn"
                                       href="add_category.php">Add Category</a><br>
                                       <br>
                                     <?php
                                     if (isset($_SESSION['admin'])){
                                         echo $_SESSION['admin'];
                                         unset($_SESSION['admin']);
                                     }
                                     ?>
                                </div>
                            </div>
                        </div>
                        <div id="inbox">
                            <div class="row">
                                <div class="large-12 columns">
                                    <div class="custom-panel blue-bg">

                                        <div class="custom-panel-body">
                                            <table class="width-100 custom-table responsive">
                                                <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Title</th>
                                                    <th>Image</th>
                                                    <th>Featured</th>
                                                    <th>Active</th>
                                                    <th>Actions</th>
                                                </tr>

                                                </thead>
                                                <?php
                                                $sql = "select * from category";
                                                $res = mysqli_query($conn, $sql);
                                                if ($res->num_rows > 0) {
                                                    while ($row = $res->fetch_assoc()) {
                                                        $id = $row['id'];
                                                        $title = $row['title'];
                                                        $image = $row['pic'];
                                                        $featured = $row['featured'];
                                                        $active = $row['active'];

                                                    ?>
                                                    <tr>
                                                        <td> <?php echo $id ?></td>
                                                        <td> <?php echo $title ?></td>

                                                        <td>

                                                            <img src="<?php echo "../".$image ?> " width="50px">


                                                        </td>

                                                        <td><?php echo $featured ?></td>
                                                        <td><?php echo $active ?></td>
                                                        <td>
                                                            <a class="alert label btn" style="background-color: #0a9d11"
                                                               href="edit_category.php?id=<?php echo $id ?>">Update Category</a>
                                                            <a class="alert label btn" href="delete-category.php?id=<?php echo $id ?>">Delete
                                                                Category</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    }
                                                } else { ?>
                                                    <tr>
                                                        <td colspan="6">
                                                            <div class="error">No Category Added.</div>
                                                        </td>
                                                    </tr>
                                                    <?php

                                                } ?>


                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
</div>

<script src="js/vendor/jquery.js"></script>
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
