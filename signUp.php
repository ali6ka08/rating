<?php 
	require "reg.php";
?>
<link rel="stylesheet" type="text/css" href="style.css">
<style>
	#errors{
		background:grey;
		padding:3px 2px;
		font-size:13px;
		font-weight:bolder;
		color:red;
	}
</style>


<html>
<head>
<title>Sign-Up</title>
</head>
<body id="body-color">
<div id="Sign-Up">
<fieldset style="width:30%"><legend>Registration Form</legend>
<table border="0">
<tr>
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
<td>Name</td><td> <input type="text" name="name"></td>
</tr>
<tr>
<td>Email</td><td> <input type="text" name="email"></td>
</tr>
<tr>
<td>UserName</td><td> <input type="text" name="user"></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass"></td>
</tr>
<tr>
<td>Confirm Password </td><td><input type="password" name="cpass"></td>
</tr>
<tr>
<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
</tr>
</form>
<?php 
	if(count($ers) != 0)
	{
		?>
			<td width='100%' colspan='2'>
				<?php 
					foreach($ers as $v)
					{
						echo "<div id='errors'>$v</div>";
					}
				?>
			</td>
		<?php
	}
?>
</table>
</fieldset>
</div>
</body>
</html>

<link rel="stylesheet" type="text/css" href="style.css">


