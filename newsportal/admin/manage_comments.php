
    <?php include 'partials/header.php';?>
    <div class="row">
      <?php include 'partials/menu.php';?>
      <div class="large-10 medium-12 small-12 columns light-grey-bg-pattern">
        
		<div id="inbox">
          <div class="row">
            <div class="large-12 columns">
              <div class="custom-panel blue-bg">
                <div class="custom-panel-body">
                  <table class="width-100 custom-table responsive">
                    <thead>
                      <tr>
                        <td>S. No.</td>
                        <td>News</td>
                        <td>Comments</td>
                        <td>Date</td>
						<td>name</td>
						<td>email</td>
                        <td>Actions</td>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql = "select * from comments";
                      $res = mysqli_query($conn, $sql);
                      if ($res->num_rows > 0) {
                      while ($row = $res->fetch_assoc()) {
                      $id = $row['id'];
                      $id_news = $row['id_post'];
                      $message=$row['message'];
                      $date=$row['date_comment'];
                      $full_name=$row['full_name'];
                      $email=$row['email'];

                      ?>
                      <tr>
                          <td><?php echo $id; ?>.</td>
                          <td><?php echo $id_news; ?></td>
                          <td><?php echo $message; ?></td>
                          <td><?php echo $date; ?></td>
                          <td><?php echo $full_name; ?></td>
                          <td><?php echo $email; ?></td>
          <td>

                         <a onClick="return confirm('Are you sure you want to delete?')" 
						 href="delete-comments.php?id=<?php echo $id;?>" class="label"> Delete</a>
                        
                        </td>
                      </tr>
<!--                      --><?php
		}}else{
			echo "<tr><td colspan='4'>No Data...</td></tr>";
		}
		?>
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
<!-- edit subcat -->
<div id="popup1" class="modal-box">
  <header> <a href="#" class="js-modal-close close">×</a>
    <h3>Edit Sub-Category</h3>
  </header>
  <div class="modal-body" id="editsubcat"> </div>
</div>
<!-- edit subcat -->


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
</body>
</html>
