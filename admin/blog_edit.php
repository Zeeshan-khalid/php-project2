<?php
include('includes/header.php'); 
if (!isset($_SESSION['id'])) {
     header('location: login.php');
  }
include('includes/navbar.php'); 
?>
  <div class="container-fluid">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h5 class="m-0 font-weight-bold text-primary">Edit Blogs
        </h5>
      </div>
    </div>
  <div class="card-body">
  
 
    <?php 
      include ('connection.php');
      if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $query = "SELECT * FROM blog WHERE id = '$id' ";
      $query_run = mysqli_query($conn, $query);
      foreach ($query_run as $row) {
    ?>
 

    <form action="code.php" method="POST">
      <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>"> 
      <div class="form-group">
        <!-- <label> Name </label> -->
        <input type="hidden" name="edit_name" value="<?php echo $_SESSION['name']; ?>" class="form-control">
      </div>
      <div class="form-group">
        <label> Title </label>
        <input type="text" name="edit_title" value="<?php echo $row['title']; ?>" class="form-control">
      </div>
      <div class="form-group">
        <label> Description </label>
        <input type="text" name="edit_descrip" value="<?php echo $row['descrip']; ?>" class="form-control">
      </div>
      <div class="form-group">
                <label> Image</label>
                <input type="file" name="edit_image" value="<?php echo $row['image']; ?>" class="form-control">
            </div>
      <a href="register.php" class="btn btn-danger"> Cancel
      </a>
      <button type="submit" name="updateblg" class="btn btn-primary">Update
      </button>
    </form>
    <?php
}	
}
?>
  </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
