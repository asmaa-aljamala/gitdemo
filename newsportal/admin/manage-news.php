<?php

include 'partials/header.php'; ?>
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
                                       href="add_news.php">Add News</a><br>
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
                                            <table class="width-100 custom-table responsive js-dynamitable" id="resultTable">
                                                <thead>
                                                <tr>
                                                    <th>S.N.</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Active</th>
                                                    <th>Actions</th>
                                                </tr>

                                                </thead>
                                                <?php
                                                $sql = "select * from posts";
                                                $res = mysqli_query($conn, $sql);
                                                if ($res->num_rows > 0) {
                                                    while ($row = $res->fetch_assoc()) {
                                                        $id = $row['id'];
                                                        $title = $row['title'];
                                                        $desc = $row['description'];
                                                        $image = $row['image'];
                                                        $category = $row['category_id'];
                                                        $active = $row['active'];

                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $id ?></td>
                                                            <td> <?php echo $title ?></td>
                                                            <td> <?php echo $desc ?></td>
                                                            <td>
                                                                <img src="<?php echo "../".$image ?> " width="50px">
                                                            </td>
                                                            <?php
                                                            $sql_categ = "select * from category where id ='$category'";
                                                            $res_categ = mysqli_query($conn,$sql_categ);
                                                            if ($res_categ->num_rows>0){
                                                                $row=$res_categ->fetch_assoc();?>
                                                                <td> <?php echo $row['title'] ?></td>
                                                                <?php
                                                            }
                                                            ?>
                                                            <td><?php echo $active ?></td>
                                                            <td class="raghda">
                                                                <a class="alert label btn" style="background-color: #0a9d11"
                                                                   href="edit_news.php?id=<?php echo $id ?>">Update News</a>
                                                                <a class="alert label btn" href="delete-news.php?id=<?php echo $id ?>">Delete
                                                                    News</a>
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
