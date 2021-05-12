<?php 
session_start();
$name=$_SESSION['name'];
$req="";
$con = mysqli_connect("localhost","root","","health");
$sql = mysqli_query($con,"SELECT * from public WHERE healthid='".$name."'");
$rs = mysqli_fetch_array($sql);

$sql2 = "SELECT * from `payments` where `uid` = '$name' and status=''";

$rss = mysqli_query($con,$sql2);

$rss2 = mysqli_num_rows($rss);

if ($rs['sugar']=='N') 
{
	$sugar = "No";
}
else
{
	$sugar= "Yes";
}

if ($rs['BP']=='N') 
{
	$bp = "No";
}

else
{
	$bp = "Yes";
}
if (isset($_POST['update'])) 
{
	$pass = $_POST['pass'];
	$sql1 = "UPDATE `public` SET `password` = '$pass' WHERE `healthid` = '$name'";

	if (mysqli_query($con,$sql1)) 
	{
		header("Refresh:0");
		echo "Updated Seccesfully";

	}
	else
	{
		echo "Couldn't update password";
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>User information</title>
	<link rel="stylesheet" type="text/css" href="pubui.css">
</head>
<body>
	
	<div>
		
		<a href="">payments<?php echo "(".$rss2.")" ?></a> &nbsp &nbsp
		<a href="index.php">Logout</a>

	</div>
		<form class="box" action="" method="post">
	<h1>General Information</h1><br>
	<label style="color: white;">Health Id</label>
	<input type="text" name="name" placeholder=" Name" readonly value=<?php echo $name; ?>><br>
	<label style="color: white;">Name</label>
	<input type="text" name="father" placeholder="Father Name" readonly value=<?php echo $rs['name']; ?>><br>
	<form>
		<label style="color: white;">Password</label>
		<input type="text" name="pass" autocomplete="off" value=<?php echo $rs['password']; ?>><br>
		<input type="submit" name="update" value="Update Password" class="update">
	</form>
	</form>
	<div class="box2">
			<h1>Contact Information</h1><br>
	<label style="color: white;">Mobile Number</label>
	<input type="text" name="name" placeholder=" Name" readonly value=<?php echo $rs['mobile']; ?>><br>
	<label style="color: white;">Father Number</label>
	<input type="text"  readonly value=<?php echo $rs['father mobile']; ?>><br>
	<label>Father Name</label>
	<input type="text" name="" readonly value=<?php echo $rs['fname']; ?>><br>
	<label>Email</label><br>
	<input type="text" readonly value=<?php echo $rs['email']; ?> >
	</div>
	<div class="box3">
			<h1>Health Information</h1><br>
	<label style="color: white;">Age</label>
	<input type="text" readonly value=<?php echo $rs['age']; ?>><br>
	<label style="color: white;">Height</label>
	<input type="text"  readonly value=<?php echo $rs['height']; ?>><br>
	<label style="color: white;">Weight</label><br>
	<input type="text" readonly value=<?php echo $rs['weight']; ?> ><br>
	<label style="color: white;">Heart beat/s</label>
	<input type="text" readonly value=<?php echo $rs['heart']; ?>>
	</div>
	<div class="box4">
		<h1>Medical Information</h1>
		<label style="color: white;">Blood Group</label>
		<input type="text" readonly value=<?php echo $rs['bgroup']; ?>>
		<label style="color: white;">Sugar</label>
		<input type="text" readonly value=<?php echo $sugar ?>>
		<label style="color: white;">Sugar Medicines</label>
		<input type="text" readonly value=<?php echo $rs['sugartab']; ?>>
		<label style="color: white;">BP</label>
		<input type="text" readonly value=<?php echo $bp ?>>
		<label style="color: white;">BP Medicines</label>
		<input type="text" readonly value=<?php echo $rs['Bptab']; ?>>
	</div>

	<div class="box5">
		<h1>Address Information</h1>
		<label style="color: white;">Door No</label>
		<input type="text" readonly value=<?php echo $rs['door']; ?>>
		<label style="color: white;">Address Location1</label>
		<input type="text" readonly value=<?php echo $rs['loc1']; ?>>
		<label style="color: white;">Address Location2</label>
		<input type="text" readonly value=<?php echo $rs['loc2']; ?>>
		<label style="color: white;">District</label>
		<input type="text" readonly value=<?php echo $rs['district'] ?>>
		<label style="color: white;">State</label>
		<input type="text" readonly value=<?php echo $rs['state']; ?>>
	</div>

</body>
</html>