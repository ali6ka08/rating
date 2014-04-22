<?php 
	session_start();
	require "localhost.php";
	$ers = array();
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$name = strip_tags(trim(mysql_real_escape_string($_POST['name'])));
		$email = strip_tags(trim(mysql_real_escape_string($_POST['email'])));
		$user = strip_tags(trim(mysql_real_escape_string($_POST['user'])));
		$pass = strip_tags(trim(mysql_real_escape_string($_POST['pass'])));
		$cpass = strip_tags(trim(mysql_real_escape_string($_POST['cpass'])));
		if(!isset($name) or empty($name) or !isset($email) or empty($email) or !isset($user) 
		or empty($user) or !isset($pass) or empty($pass)  or !isset($cpass) or empty($cpass))
		{
			array_push($ers,"Enter all fields!");
		}
		else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
		{
			array_push($ers,"Invalid Email");
		}
		else if($pass != $cpass)
		{
			array_push($ers,"Incorrect passwords");
		}
		else
		{
			$pass = md5($pass);
			$cpass = md5($cpass);
			$q = "
				SELECT email,id FROM registration WHERE email = '".$email."' ORDER BY id DESC LIMIT 1
			";
			$q = mysql_query($q);
			$result = mysql_num_rows($q);
			if($result != 0)
			{
				array_push($ers,"This email is used");
			}
			else
			{
					$q = "
						INSERT INTO registration(name,email,username,password,confirm) 
						VALUES('".$name."','".$email."','".$user."','".$pass."','".$cpass."')
					";
					$q = mysql_query($q);
					$_SESSION['username'] = $user;
					header("Location:../");
			}
		}
	}
?>
