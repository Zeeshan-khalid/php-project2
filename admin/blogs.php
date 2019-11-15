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
        <h5 class="modal-title" id="exampleModalLabel">Add New Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

            <div class="form-group">
                <!-- <label> Name </label> -->
                <input type="hidden" name="blog_name" class="form-control" placeholder="Enter name" value="<?php echo $_SESSION['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="blog_title" class="form-control" placeholder="Enter title" required>
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="text" name="blog_description" class="form-control" placeholder="Enter Description" required>
            </div>
            <div class="form-group">
                <label>Upload Image</label>
                <input type="file" name="blog_image" id="blog_image" class="form-control" required>
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">
  <div><?php  echo Message(); 
          echo SuccessMessage();
        ?></div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">BLOGS
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#blogmodal">
              Add New Blog
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

    <?php
      $connection = mysqli_connect("localhost","root", "", "adminpanel");
      $id = $_SESSION['id'];
      $query = "SELECT *, blog.id AS blogid FROM blog JOIN register ON blog.blog_id = register.id WHERE blog_id= ".$id.""; 
      $query_run = mysqli_query($connection, $query);
     ?>

 
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Title </th>
            <th>Description</th>
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
            <td><?php echo $row['descrip']; ?>  </td>
            <td><img src="upload/<?php echo $row['image']; ?>" alt="" width="150px" height = "100px"> </td>
            <td>
                   <a class="btn btn-success" href="blog_edit.php?id=<?php echo $row['blogid']; ?>">EDIT</a>
              
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_blg" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>
        <?php
        }
      }
 
      else {
        $_SESSION['ErrorMessage'] = "No record found!!";
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