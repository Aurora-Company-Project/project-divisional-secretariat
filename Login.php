<?php
	session_start();
	if (empty($_SESSION['error'])){
		$message ='';
	} else {
		$message = $_SESSION['error'];
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
	<link href="CSS/Project_Login.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="bg"></div>

	<form class="memberLoginForm" method="POST" action="index.php" autocomplete="off">

        <h2 align="center">LOGIN FORM</h2>
        <div class="imgcontainer"><img src="images/user_icon.jpg" alt="" class="loginimge"/></div>
        <div class="container">
            <span class="warningMsg"><img class="warImg" src="images/warning.gif" height="25px" width="25px"/><?php echo $message ; ?></span><br />
            <label for="user"><b>Username</b></label><br />
            <input class="user" name="uname" type="text" placeholder="Enter Username" required autofocus/><br />
            <label for="psw"><b>Password</b></label><br />
            <input class="psw" name="Psw" type="password" placeholder="Enter Password" required/><br />
            <button class="subBtn" name="SubmitBotton" type="submit">Login</button>
           
        </div>
    </form>

	</body>
	
</html>