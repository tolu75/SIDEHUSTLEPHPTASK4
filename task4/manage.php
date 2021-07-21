<?php 
include ('task4dbconfig.php');
session_start();
 if (isset($_POST['addproduct'])) 
 {
 	$user = $_SESSION['username'];
 	$pname = $_POST['aname'];
 	$price = $_POST['aprice'];
        $description = $_POST['description'];
 	$sql = "INSERT INTO product(Name,P_name,Price,Description) VALUES(:user,:pname,:price,:description)";
 	$query = $dbh -> prepare($sql);
 	$query->bindParam(':pname',$pname,PDO::PARAM_STR);
 	$query->bindParam(':price',$price,PDO::PARAM_STR);
 	$query->bindParam(':user',$user,PDO::PARAM_STR);
        $query->bindParam(':description',$description,PDO::PARAM_STR);
 	$query-> execute();
 	$lastInsertId = $dbh->lastInsertId();
 	if($lastInsertId)
 	{
 		echo "<script>alert('Product added sucessfully')</script>";
 	}
 	else
 	{
 		echo "<script>alert('oops try again')</script>";
 	}	
 }

if (isset($_POST['deleteproduct'])) 
{
        $dname = $_POST['dname'];
        $name = $_SESSION['username'];
        $sql = "DELETE FROM product WHERE Name='$name' and P_name='$dname'";

        $query = $dbh->prepare($sql);
        $query->execute();
        if ($query->rowCount() > 0) {
                
                echo "<script>alert('Product Deleted sucessfully');</script>";
        }
        else
        {
                echo "<script>alert('Product is not yours/product doesnt exist');</script>";
        }
}
        

if (isset($_POST['updateproduct'])) 
{       
        $name = $_SESSION['username'];
        $uname = $_POST['uname'];
        $uprice = $_POST['uprice'];
        $udescription = $_POST['udescription'];
        $sql = "UPDATE product SET Price=:uprice,Description=:udescription  WHERE (Name=:name and P_name=:uname)";
        $query = $dbh -> prepare($sql);
       $query->bindParam(':uprice',$uprice,PDO::PARAM_STR);
       $query->bindParam(':udescription',$udescription,PDO::PARAM_STR);
       $query->bindParam(':uname',$uname,PDO::PARAM_STR);
       $query->bindParam(':name',$name,PDO::PARAM_STR);
       $query->execute();
       if ($query->rowCount()) 
       {
                echo "<script>alert('Product Updated sucessfully');</script>";
        }
       else
       {
                echo "<script>alert('Something Went Wrong');</script>";
       }

}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Manage Products</title>
</head>
<body>
<?php include ('header.php'); ?>
<center>
<form method="post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
        <h3>Add Product </h3>  
 		Product Name: <input type="text" name="aname" placeholder="Input Product Name" required><br>
                Product Price: <input type="text" name="aprice" placeholder="Input Product Price" required><br>
                Product Description: <textarea rows="3" cols="30" name="description" required></textarea><br>
        <input type="submit" name="addproduct" value="Add Product"><br><br>
    </form>
        
<form method="post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
        <h3>Update Product</h3>    
        Product Name:<input type="text" name="uname" size="30" required><br>
        Product Price:<input type="text" name="uprice" size="30"  required><br>
        Product Description: <input type="text" name="udescription" size="30" required><br>
        <input type="submit" name="updateproduct" value="Update Product"><br><br>
    </form>

<form method="post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" >
        <h3>Delete Product</h3>   
        Product Name:<input type="text" name="dname" placeholder="Input Product Name" required><br>
        <input type="submit" name="deleteproduct" value="Delete product" >
 	</form></center>
</body>
</html>