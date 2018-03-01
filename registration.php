<?php
$servername ="localhost";
	$username 	="root";
	$password 	="";
	$dbname 	="user";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if(isset($_POST['register_btn']))
	{
		session_start();
		$name = mysqli_real_escape_string($conn,$_POST['name']);
		$email = mysqli_real_escape_string($conn,$_POST['email']);
		$userName = mysqli_real_escape_string($conn,$_POST['userName']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$confirmPassword = mysqli_real_escape_string($conn,$_POST['confirmPassword']);
		$gender = mysqli_real_escape_string($conn,$_POST['gender']);
		$dd = mysqli_real_escape_string($conn,$_POST['dd']);
		$mm = mysqli_real_escape_string($conn,$_POST['mm']);
		$yy = mysqli_real_escape_string($conn,$_POST['yy']);
		
		if ($password == $confirmPassword)
		{
			
			$sql = "INSERT INTO USER VALUES('$name','$email','$userName','$password','$gender','$dd','$mm','$yy')";
			mysqli_query($conn,$sql);
			$_SESSION['message'] = "You are now logged in";
			//$_SESSION['id'] = $id;
			header("location: login.php");
		}
		else 
		{
			$_SESSION['message'] = "Password doesn't match";
		}
		
	}
	
	

?>

<fieldset>
    <legend><b>REGISTRATION</b></legend>
	<form method="Post" action="registration.php">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text">
					<abbr title="hint: sample@example.com"><b>i</b></abbr>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input name="userName" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input name="password" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input name="confirmPassword" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Gender</legend>    
						<input name="gender" type="radio">Male
						<input name="gender" type="radio">Female
						<input name="gender" type="radio">Other
					</fieldset>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Date of Birth</legend>    
						<input type="text" size="2" name="dd" />/
						<input type="text" size="2" name="mm"/>/
						<input type="text" size="4" name="yy"/>
						<font size="2"><i>(dd/mm/yyyy)</i></font>
					</fieldset>
				</td>
				<td></td>
			</tr>
		</table>
		<hr/>
		<input type="submit"  name = "register_btn"value="Submit">
		<input type="reset">
	</form>
</fieldset>