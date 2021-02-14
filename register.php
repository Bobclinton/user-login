<?php //include('function.php') ?>
<?php
    $con = mysqli_connect('127.0.0.1','root','','multi_login');
    if(isset($_POST['save'])){
        $id = htmlspecialchars($_POST['id'],ENT_QUOTES);
        $username = htmlspecialchars($_POST['username'],ENT_QUOTES);
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $password_1 = htmlspecialchars($_POST['password_1'],ENT_QUOTES);
        $password_2 = htmlspecialchars($_POST['password_2'],ENT_QUOTES);

        //
        // form validation: ensure that the form is correctly filled
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        if (count($con->error)){
            $password = md5($password_1);
            $qry = mysqli_query($con,"INSERT INTO users (id,username,email,password)
                                VALUES ('$id','$username','$email','$password')");
            if ($qry){
                echo "<script>alert('Customer Added Successfully')</script>";
            }
            else{
                echo $con->error;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="POST">
<?php //echo display_error(); ?>
    <input name="id" type="text">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
	<div class="input-group">
		<button type="submit" name="save" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
</form>
</body>
</html>
