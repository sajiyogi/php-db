<?php
//we must never forget to start the session
session_start();

$errorMessage = '';
if (isset ($_POST['txtUserId']) && 
	isset($_POST['txtPassword'])){
	include 'koneksi.php';

	$userId = $_POST['txtUserId'];
	$password = $_POST['txtPassword'];
	//check if the username and password combination is correct
	$sql = "select * from user where user_id ='$userId' AND password= '$password'";

	$result = $host->query($sql); 
	if(!$result){
		
		die("Query Error". $host->error);
	}

	//if($_POST['txtUserId'] === 'admin' &&
		//$_POST['txtPassword'] === 'admin') {
		if (mysqli_num_rows($result)== 1){
			//the user id and password match,
			//set the session
			$_SESSION['basic_is_logged_in'] = true;

			//affter login we move to the main page header

		//the username and password match,
		//set the session
		
	//after login we move to the  main page 
	header('Location: index.php');
	exit;
	} else{
		$errorMessage='Sorry, wrong username / password';
	}
	// include 'closedb.php';
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html";
charset="iso-8859-1">
	<title>Login Form</title>
	<style type="text/css">
	<!--
	.style5 {
	color : #0000FF;
	font-weight: bold;
	}
	-->
	</style>
	</head>

	<body>
	<?php
	if ($errorMessage !=''){
		?>
		<p><div align="center"><span class="style5"><?php echo $errorMessage; ?>
		</span> </p>
		<?php
	}
	?>

	</div>
	</div>
	<form action ="" method="post" name="FrmLogin" id="frmLogin">
	<table width="400" border="1" align="center">
	<tr>
	<th width="160" scope="col"><div align="left">User ID</div></th>
	<th width="224" scope="col"><div align="left">
	<input name="txtUserId" type="text" id="txtUserId">
	</div> </th>
	</tr>
	<tr>
		<td><div align ="left">Password</div></td>
		<td><input name="txtPassword" type="password" id="txtPassword">
	</td></tr>
	<tr>
		<td>&nbsp;</td>
		<td><input name="btnLogin" type="submit" id="btnLogin" value="Login"></td>
		</tr>
	</table>
	</form>
	</body>
	</html>