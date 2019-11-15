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
        <h5 class="m-0 font-weight-bold text-primary">Edit Products
        </h5>
      </div>
    </div>
  <div class="card-body">

    <?php 
      include ('connection.php');
      if (isset($_POST['edit_btn'])) {
      $id = $_POST['edit_id'];
      $query = "SELECT * FROM store WHERE id = '$id' ";
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
        <label> Discounted price </label>
        <input type="text" name="edit_dprice" value="<?php echo $row['dprice']; ?>" class="form-control">
      </div>
      <div class="form-group">
        <label> Actual price </label>
        <input type="text" name="edit_aprice" value="<?php echo $row['aprice']; ?>" class="form-control">
      </div>
      <div class="form-group">
                <label>Image</label>
                <input type="file" name="edit_image" value="<?php echo $row['image']; ?>" class="form-control" > 
            </div>
      <a href="register.php" class="btn btn-danger"> Cancel
      </a>
      <button type="submit" name="updatepro" class="btn btn-primary">Update
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
