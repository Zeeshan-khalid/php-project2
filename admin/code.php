<?php

include 'includes/session.php';

$connection = mysqli_connect("localhost", "root", "", "adminpanel");


	



	if (isset($_POST['updatepro'])) {
			$id = $_POST['edit_id'];
			$username = $_POST['edit_name'];
			$title = $_POST['edit_title'];
			$dprice = $_POST['edit_dprice'];
			$aprice = $_POST['edit_aprice'];
			$image = $_POST['edit_image'];

			$query = "UPDATE store SET name = '$username', title = '$title', dprice= '$dprice', aprice= '$aprice', image = '$image' WHERE id = '$id'";

			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				$_SESSION['SuccessMessage'] = "Your Data is Updated";
				header('Location: shop.php');

			}else {
				$_SESSION['ErrorMessage'] = "Your Data is not Updated";
				header('Location: shop.php');
			}
		}





	if (isset($_POST['add'])) {
		$name = $_POST['pro_name'];
		$title = $_POST['pro_title'];
		$dprice = $_POST['pro_dprice'];
		$aprice = $_POST['pro_aprice'];
		$image = $_FILES["pro_image"]["name"];
		$image1 = $_FILES["pro_image"]["tmp_name"];
		$targer_dir = "upload/";
		$target_file = $targer_dir . basename($image);
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			if (move_uploaded_file($image1, $target_file)) {
				echo "The file has been uploaded";
			} else {
			echo "Sorry, there was an error uploading your file.";
			}

			$query = "INSERT INTO store (name, title, dprice, aprice, image) VALUES ( '$name', '$title', '$dprice', '$aprice', '$image')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				$_SESSION['SuccessMessage'] = "Blog is added to the database";
			    header('Location: shop.php');
			  }
			  else {
			    $_SESSION['ErrorMessage'] = "Blog is not added to the database";
			    header('Location: shop.php'); 
			  }
	}

	




	if (isset($_POST['save'])) {
		$name = $_POST['blog_name'];
		$title = $_POST['blog_title'];
		$description = $_POST['blog_description'];
		$image = $_FILES["blog_image"]["name"];
		$image1 = $_FILES["blog_image"]["tmp_name"];
		$targer_dir = "upload/";
		$target_file = $targer_dir . basename($image);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

			if (move_uploaded_file($image1, $target_file)) {
			echo "The file has been uploaded.";
			} else {
			echo "Sorry, there was an error uploading your file.";
			}

			$query = "INSERT INTO blog (name, title, descrip, image) VALUES ( '$name', '$title', '$description', '$image')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
			    $_SESSION['SuccessMessage'] = "Blog is added to the database";
			    header('Location: blogs.php');
			  }
			  else {
			    $_SESSION['ErrorMessage'] = "Blog is not added to the database";
			    header('Location: blogs.php'); 
			  }
	}

		

 
	if (isset($_POST['updateblg'])) {
		$id = $_POST['edit_id'];
		$username = $_POST['edit_name'];
		$title = $_POST['edit_title'];
		$descrip = $_POST['edit_descrip'];
		$image = $_POST['edit_image'];

		$query = "UPDATE blog SET name = '$username', title = '$title', descrip= '$descrip', image = '$image' WHERE id = '$id'";

		$query_run = mysqli_query($connection, $query);

		if ($query_run) {
			$_SESSION['SuccessMessage'] = "Your Data is Updated";
			header('Location: blogs.php');

		}else {
			$_SESSION['ErrorMessage'] = "Your Data is not Updated";
			header('Location: blogs.php');
		}
	}




	if (isset($_POST['delete_blg'])) {
		$id = $_POST['delete_id'];

		$query = "DELETE FROM blog WHERE id='$id'";
		$query_run= mysqli_query($connection, $query);

		if ($query_run) {
			$_SESSION['SuccessMessage'] = "Your Data is daleted";
			header('Location: blogs.php');
		}else {
			$_SESSION['ErrorMessage'] = "Your Data is not deleted";
			header('Location: blogs.php');
		}
	}






	if (isset($_POST['registerbtn'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpassword = $_POST['confirmpassword'];

		if ($password == $cpassword) {
			$query = "INSERT INTO register (username, email, password) VALUES ( '$username', '$email', '$password')";
			$query_run = mysqli_query($connection, $query);

			if ($query_run) {
				$_SESSION['success'] = "Admin profile added";
				header('Location: register.php');
			}else {
				$_SESSION['status'] = "Admin profile Not added";
				header('Location: register.php');
			}
		}
		else {
			$_SESSION['status'] = "Password doesnt match";
				header('Location: register.php');
		}
	}



	if (isset($_POST['updatebtn'])) {
		$id = $_POST['edit_id'];
		$username = $_POST['edit_username'];
		$email = $_POST['edit_email'];
		$password = $_POST['edit_password'];

		$query = "UPDATE register SET username = '$username', email = '$email', password= '$password' WHERE id = '$id'";

		$query_run = mysqli_query($connection, $query);

		if ($query_run) {
			$_SESSION['success'] = "Your Data is Updateds";
			header('Location: register.php');

		}else {
			$_SESSION['status'] = "Your Data is not Updateds";
			header('Location: register.php');
		}
	}





	if (isset($_POST['delete_btn'])) {
		$id = $_POST['delete_id'];

		$query = "DELETE FROM register WHERE id='$id'";
		$query_run= mysqli_query($connection, $query);

		if ($query_run) {
			$_SESSION['success'] = "Your Data is daleted";
			header('Location: register.php');
		}else {
			$_SESSION['status'] = "Your Data is not deleted";
			header('Location: register.php');
		}
	}


	if (isset($_POST['delete_pro'])) {
		$id = $_POST['delete_id'];

		$query = "DELETE FROM store WHERE id='$id'";
		$query_run= mysqli_query($connection, $query);

		if ($query_run) {
			$_SESSION['SuccessMessage'] = "Product deleted successfully";
			header('Location: shop.php');
		}else {
			$_SESSION['ErrorMessage'] = "Your Data is not deleted";
			header('Location: shop.php');
		}
	}


?>