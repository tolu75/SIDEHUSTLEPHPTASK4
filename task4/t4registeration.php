<?php 
include('task4dbconfig.php');

$l = 6;
if (isset($_POST['register'])) 
{
	if (strlen($_POST['username']) && strlen($_POST['password'])  >= $l) 
	{	
		$username=$_POST['username']; 
		$phone=$_POST['phone'];
		$password=$_POST['password']; 
		$secret=$_POST['secret'];
		$sql="INSERT INTO  users(Name,Phone,Password,Secret) VALUES(:username,:phone,:password,:secret)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':username',$username,PDO::PARAM_STR);
		$query->bindParam(':phone',$phone,PDO::PARAM_STR);
		$query->bindParam(':password',$password,PDO::PARAM_STR);
		$query->bindParam(':secret',$secret,PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if($lastInsertId)
		{
		echo "<script>alert('Registration successfull.Please Login');</script>";
		}
		else 
		{
		echo "<script>alert('Something went wrong. Please try again');</script>";
		}
		
	}
else
{
	echo "<h3>Username and password must be greater than 6 characters";
}

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Register</title>
</head>
<body bgcolor="green">

<form method="post" >
	<center><h2>REGISTER
	<h3>Username: <input type="text" name="username" placeholder="Enter a Username" required></h3>
    <h3>Phone: <input type="text" name="phone" placeholder="Enter your Phone No." required maxlength="11" ><br></h3>
	<h3>Password: <input type="password" name="password" placeholder="Enter a Password" required ></h3>
	<marquee><h5>Enter a secret phrase which would be used to reset your password. Note: Please keep it safe.</h5></marquee>
	<input type="text" name="secret" placeholder="Secret Phrase" required ><br></h3>
	<input type="submit" name="register" value="Register">
	<center>Already Registered? <a href="t4login.php"> Please Login:)</a></b></center>
</form></center>

</body>
</html>