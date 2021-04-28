
<div class="col-md-4">

    <!-- Search Widget -->
    <div class="card mb-4">
        <h5 class="card-header">Search</h5>
        <div class="card-body">
            <form name="search" action="search.php" method="post">
                <div class="input-group">

                    <input type="text" name="searchtitle" class="form-control" placeholder="Search for..." required>
                    <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
            </form>
        </div>
    </div>
</div>

<!-- Categories Widget -->
<div class="card my-4">
    <h5 class="card-header">Categories</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                    <?php
                    $sql = "select * from category";
                    $res = mysqli_query($conn, $sql);
                    if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                        $id = $row['id'];
                        $title = $row['title'];


                        ?>

                        <li>
                            <a href="category.php?id=<?php echo $id ?>"><?php echo $title; ?></a>
                        </li>
                    <?php }} ?>
                </ul>
            </div>

        </div>
    </div>
</div>

<!-- Side Widget -->
<div class="card my-4">
    <h5 class="card-header">Recent News</h5>
    <div class="card-body">
        <ul class="mb-0">
            <?php
            $sql = "select * from posts limit 8";
            $res = mysqli_query($conn, $sql);
            if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $id = $row['id'];
                $title = $row['title'];

                ?>

                <li>
                    <a href="news-details.php?nid=<?php echo $id?>"><?php echo $title; ?></a>
                </li>
            <?php }} ?>
        </ul>
    </div>
</div>

</div>
