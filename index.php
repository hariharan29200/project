<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php
	if (isset($_COOKIE['keep'])) 
	{
		header('location:profile.php');
	}
	
		
	?>
</head>
<body>
	<fieldset>
		<legend> Welcome to the Deparment </legend>
		<form method="POST" action= "<?php echo $_SERVER['PHP_SELF']; ?>" >
			<table>
				<tr>
					<td align="right">User Name : </td>
					<td><input type="text" name="uname" placeholder="username"></td>
				</tr>
				<tr>
					<td align="right">Password : </td>
					<td><input type="password" name="pwd" placeholder="password"></td>
				</tr>
				<tr> 
					<td></td>
					<td><input type="checkbox" name="keep"> keep me login for the an hour</td>
				</tr>
				<tr>
					<td colspan="1" align="right"></td>
					<td><input type="submit" name="logbtn" value="Login"></td>
				</tr>
			</table>
		</form>
	</fieldset>

</body>
</html>

<?php
	require_once'config/config_dep.php';
	require_once'funct/dep_fun.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		$uname=trim($_POST['uname']);
		$pwd=trim($_POST['pwd']);
		$keep=$_POST['keep'];

		session_start();
		$_SESSION['user']=$uname;

		if($keep)
		{
			setcookie('keep',$keep,time()+3600);
			$_COOKIE['keep'];
		}
		

		// if (empty($uname)) {echo "Please provide the username";}
		// if (empty($pwd)) {echo "Please provide the pwd";}

		login($uname,$pwd,$keep,$connection);
	}


?>
