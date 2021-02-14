<?php //include('function.php') ?>
<?php
    $con = mysqli_connect('127.0.0.1','root','','multi_login');
    if (isset($_POST['login'])){
        $username=htmlspecialchars($_POST['username'],ENT_QUOTES);
        $password=htmlspecialchars($_POST['password'],ENT_QUOTES);
        //
        $qry = mysqli_query($con,"SELECT username,password FROM users WHERE username = '$username' AND password='$password'");
        if ($qry){
            if(mysqli_num_rows($qry)>0){
                $row=mysqli_fetch_array($qry);
                $_SESSION['username'] = $row['username'];
                header("Location:index.php");
            }
            else{
                echo "wrong username or password";
            }
        }
        else{
            echo $con->error;
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Login</h2>
	</div>
	<form method="POST">

<!--		--><?php //echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
</body>
</html>