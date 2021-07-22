<?php 
include('task4dbconfig.php');
session_start();

$l = 6;
if (isset($_POST['login'])) 
{
	if (strlen($_POST['username']) && strlen($_POST['password'])  >= $l) 
	{
		$_SESSION['username'] = $_POST['username'];
		$name = $_POST['username'];
		$password = $_POST['password'];
		$sql = "SELECT Name,Password FROM users WHERE Name=:name and Password=:password";
		$query= $dbh -> prepare($sql);
		$query-> bindParam(':name', $name, PDO::PARAM_STR);
		$query-> bindParam(':password', $password, PDO::PARAM_STR);
		$query-> execute();
		if($query->rowCount() > 0)
		{
		$_SESSION['name']=$_POST['username'];
		header("Location: t4dashboard.php");
		}
		else
		{
			echo "<script>alert('invalid details');</script>";
		}
	}
	else
	{
		echo "<script>alert('username or Password invalid')</script";
	}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
</head>
<body bgcolor="green">
<center><h2>LOGIN</h2>
<form method="post" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<h3>Username: <input type="text" name="username" placeholder="Username" required></h3>
		<h3>Password: <input type="password" name="password" placeholder="Password" required></h3>
		<input type="submit" name="login" value="Login">
		<center>Don't Have an Account? <a href="index.php"> Please Register:)</a></b></center>
	</form>
</center>
</body>
</html>