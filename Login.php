<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/LoginForm.css" rel="stylesheet" type="text/css" />
<title>Login</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="Content"> 
<div id="PageHeading">
  <h1>Login!</h1>
</div>
<div id="Message">
<h2> Forgot Your Password? <br/> <a href="ForgotPassword.php"> Request New Password </a> </h2>
<h2> Doesn't have an account? <br/> <a href="SignUp.php"> Register Now </a></h2>
</div>
<div id="Detail">
<h2 id="DetailHeader"> Enter Your Login Details! </h2>
<form> 
<label for="username"> User Name </label> 
<br/>
<input type="text" id="username" name="username" /> <br/>
<label for="pswrd"> Password </label> <br/>
<input type="password" id="pswrd" name="pswrd" /> <br/>
<button> Login </button>
</form>

 </div>
</div>
<div id="footer"></div>
</div>
</body>
</html>