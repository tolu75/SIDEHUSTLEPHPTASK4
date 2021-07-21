<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	 <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
	<title>Dashboard</title>
</head>
<body>
	<!-- header-->
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>   
                            <li><a href="t4dashboard.php">  Dashboard</a></li>
                            <li><a href="manage.php"> Manage Products</a></li>
                            <li><a href="reset.php"> Reset Password</a></li>
                            <li><a href="logout.php"> Logout</a></li>
                        </ul>
                    </div>
                </div>
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                                <span class="key"><?php echo "<h3>Welcome &nbsp". $_SESSION['name'];  ?></span>
                        </ul>
                </div>
           
        </div>
    </div> <!-- End header area -->

</body>
</html>