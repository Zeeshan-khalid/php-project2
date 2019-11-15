<?php
include('includes/header.php'); 
include('connection.php'); 
?>

<?php

  if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 

    $select = 'SELECT * FROM register WHERE email = "'.$email.'" AND password = "'.$password.'"';

    $query = mysqli_query($conn, $select);

    $result = mysqli_num_rows($query);

    if ($result==1) {
      $row = mysqli_fetch_array($query);
      $id = $row['id'];
      $name = $row['username'];
      $_SESSION['id']= $id;
      $_SESSION['name']= $name;
      $_SESSION['email']= $email; 
      echo '<script type="text/javascript" language="javascript">
            window.open("index.php", "_self");
            </script>';
    }
    else {
      $_SESSION['ErrorMessage'] = "Invalid Username or Password";
  }
} 

 ?>




<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h2 text-gray-900 mb-4">Login Here!</h1>
                <div><?php  echo Message(); 
                echo SuccessMessage();
              ?></div>
              </div>

                <form class="user" action="login.php" method="POST">

                    <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                    </div>
            
                    <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                    <hr>
                </form>


            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php
include('includes/scripts.php'); 
?>