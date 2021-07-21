<?php 
include ('task4dbconfig.php');
session_start();
$name = $_SESSION['username'];
$l = 6;
if (isset($_POST['reset'])) 
{
	if (strlen($_POST['newpassword'])  >= $l)
	{
		$secret = $_POST['secret'];
		$newpassword = $_POST['newpassword'];
		$sql = "SELECT Secret FROM users WHERE Secret=:secret";
		$query = $dbh -> prepare($sql);
		$query-> bindParam(':secret', $secret, PDO::PARAM_STR);
		$query-> execute();
		if($query->rowCount() > 0)
		{
			$sql1 = "UPDATE users SET Password=:newpassword WHERE Secret=:secret";
			$query1 = $dbh -> prepare($sql1);
			$query1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
			$query1-> bindParam(':secret', $secret, PDO::PARAM_STR);
			$query1-> execute();
			echo "<script>alert('Password Change Successful');</script>";	
		}
		else
		{
			echo "<script>alert('Secret Phrase Incorrect!');</script>";
		}

	}
	else
	{
		echo "<script>alert('Password too short,must be 6 or more characters')</script>;";
	}
}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Reset Password</title>
</head>
<body>
<?php include('header.php'); ?>


<center><h2>PASSWORD RESET</h2>
<form method="post" action= "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
		<h3>Secret Phrase: <input type="password" name="secret" placeholder="Enter your secret Phrase" required></h3>
		<h3>New Password: <input type="password" name="newpassword" placeholder="Enter a new Password" required></h3>
		<input type="submit" name="reset" value="Reset">
	</form>
</center>

</body>
</html>