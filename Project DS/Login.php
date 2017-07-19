<?php
	session_start();
	if (isset($_GET['message'])){
		$message = $_GET['message'];
	}elseif (empty($_SESSION['error'])){
		$message ='';
	} else{
		$message = $_SESSION['error'];
	}
	if (isset($_POST['register'])){
		header("Location: SignUp.php");
	}
	if(isset($_POST['login'])){
		require_once('connect_database.php');
		$user_name = $_POST['username'];
		$pswd = $_POST['pswrd'];
		$login_query = "SELECT * FROM user_accounts WHERE user_name = '$user_name' AND pwd = SHA('$pswd') AND account_state = 1";
		$result = database_query($login_query);
		if ((mysqli_num_rows($result)==1)){
			$user_row = mysqli_fetch_array($result);
			$_SESSION['user_id'] = $user_row['user_id'];
			$_SESSION['access_level'] = $user_row['access_level'];
			$_SESSION['first_name'] = $user_row['first_name'];
			$_SESSION['last_name'] = $user_row['last_name'];
			if ($user_row['access_level']=='Admin'){
				header("Location: AccountAdmin.php? <?php echo SID;?>");
			} else{
				header("Location: AccountOfficer.php? <?php echo SID;?>");
			}
		} else {
			$message = 'Invalid Username/Password';
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<html>
	<head>
	<title>Login</title>
	    <link rel="stylesheet" href="CSS/Project_Login.css"/>

	</head>
	<body>
		<div id="bg"></div>
	
	<div class="bgimage">
	<form class="memberLoginForm" method="POST" action="Login.php" autocomplete="off" id="loginform" name="loginform">

        <h2 align="center">LOGIN FORM</h2>
        <div class="imgcontainer"><img src="images/user_icon.jpg" alt="" class="loginimge"/></div>
        <div class="container">
            <span class="warningMsg"><?php if (!($message=='')) 
			echo '<img class="warImg" src="images/warning.gif" height="25px" width="25px"/>'; 
			echo '       '.$message ; ?></span><br/>
            <label for="user"><b>Username</b></label><br />
            <input class="user" name="username" type="text" placeholder="Enter Username" autofocus/><br />
            <label for="psw"><b>Password</b></label><br />
            <input class="psw" name="pswrd" type="password" placeholder="Enter Password"/>
			<a class="forgetLink" href=""> Forgot your password?</a> <br/> <br/>
            <button class="subBtn" name="login" type="submit" form="loginform">Login</button><br /><br />
           	<button class="subBtn" name="register" type="submit" form="loginform">Register</button>

        </div>
    </form>

	</body>
	
</html>