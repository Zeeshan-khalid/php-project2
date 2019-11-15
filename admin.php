<?php
	require ('include/header.php');
	require ('include/session.php');
	require ('connection.php');?>
	

<?php

	if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 

  	$select = 'SELECT * FROM admin WHERE email = "'.$email.'" AND password = "'.$password.'"';

		$query = mysqli_query($conn, $select);

		$result = mysqli_num_rows($query);

	  if ($result==1) {
	    $row = mysqli_fetch_array($query);
	    $id = $row['id'];
	    $name = $row['name'];
	    $_SESSION['id']= $id;
	    $_SESSION['name']= $name;
	    $_SESSION['email']= $email; 
	    echo '<script type="text/javascript" language="javascript">
            window.open("shop.php", "_self");
            </script>';
	  }else {
	    $_SESSION['ErrorMessage'] = "Invalid Username or Password";
  }
}

 ?>




	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Login Panel</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Login</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/login.jpg" alt="">
						<div class="hover">
							<h4>New to our website?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="primary-btn" href="registration.php">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Log in to enter</h3>
							<div class="container"><?php  echo Message(); 
				                echo SuccessMessage();
				              ?></div>
						<form class="row login_form" action="admin.php" method="post" id="contactForm" novalidate="novalidate">
							<div class="col-md-12 form-group">
								<input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									<input type="checkbox" id="f-option2" name="selector">
									<label for="f-option2">Keep me logged in</label>
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="submit" class="primary-btn">Log In</button>
								<a href="#">Forgot Password?</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php require ('include/footer.php'); ?>