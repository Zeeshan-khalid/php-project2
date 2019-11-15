 <?php

include('includes/header.php');
if (!isset($_SESSION['id'])) {
     header('location: login.php');
  }
include('includes/navbar.php'); 
?>


<div class="modal fade" id="blogmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <!-- <label> Name </label> -->
                <input type="hidden" name="pro_name" class="form-control" placeholder="Enter name" value="<?php echo $_SESSION['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="pro_title" class="form-control" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label>Discounted Price</label>
                <input type="number" name="pro_dprice" class="form-control" placeholder="Enter Discounted Price" required>
            </div>
            <div class="form-group">
                <label>Actual Price</label>
                <input type="number" name="pro_aprice" class="form-control" placeholder="Enter Actual Price" required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="pro_image" id="pro_image" class="form-control" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Products page
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#blogmodal">
              Add New Product
            </button>
    </h6>
  </div>
  <div><?php  echo Message(); 
          echo SuccessMessage();
        ?></div>

  <div class="card-body">

    <div class="table-responsive">

    <?php 
      $connection = mysqli_connect("localhost","root", "", "adminpanel");
      $query = "SELECT * FROM store";
      $query_run = mysqli_query($connection, $query);
     ?>


      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Title </th>
            <th>Discounted price</th>
            <th>Actual price</th>
            <th>Images</th>
            <th>EDIT </th> 
            <th>DELETE </th>
          </tr>
        </thead>
        <tbody>
      <?php
      if (mysqli_num_rows($query_run) > 0) {
        while ($row = mysqli_fetch_assoc($query_run)) {
          ?>

          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>RS <?php echo $row['dprice']; ?>  </td>
            <td>RS <?php echo $row['aprice']; ?>  </td>
            <td><img src="upload/<?php echo $row['image']; ?>" alt="" width="150px" height = "100px"> </td>
            <td>
                <form action="shop_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_pro" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        <?php
        }
      }
      else {
        $_SESSION['ErrorMessage'] = "Product is not added to the database";
      }

       ?>

        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>