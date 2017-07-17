<?php
	//require_once("access_admin.php");
	if(isset($_POST['request'])){
		include 'connection.php';
		$user_name=$_POST['username'];	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/LoginForm.css" rel="stylesheet" type="text/css" />
<title>Request New Password</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="Content"> 
<div id="PageHeading">
  <h1>Request New Password!</h1>
</div>
<div id="Message">
<h2>New password will be sent your email shortly.</h2>

</div>
<div id="Detail">
<h2 id="DetailHeader"> Enter Your Username! </h2>

<form action="" method="post"> 
    <label for="username"> User Name </label> 
    <br/>
    <input type="text" id="username" name="username" /> <br/>
    <button id="request" name="request"> Request </button>
</form>
<?php 
	if (isset($_POST['request']) && (!(!isset($username) || trim($username) == ''))){
		$user_name=$_POST['username'];	
		$num= rand(1000,9999);
		$num="new".$num;
		$update_query = "UPDATE `user_accounts` SET pwd='$num' WHERE user_name='$user_name'";		
        $retval = mysqli_query( $link,$update_query);
		    
        if(! $retval ) {
             die('Could not update data: ' . mysql_error());
        }
        echo "Updated password successfully and new password sent to email\n";
		
		$query = "SELECT email FROM `user_accounts` WHERE user_name='$user_name'";
		$result = mysqli_query($link,$query); 
		while($row=mysqli_fetch_array($result)){
			$email=$row['email'];
			}
			
		$to = $email;
		$subject = "My subject";
		$message = "Hello world!";
		$headers = "From: webmaster@example.com" . "\r\n" .
		"CC: somebodyelse@example.com";
		
		$retval = mail($to,$subject,$message,$header);
 
         if( $retval == true ) {
            echo "Message sent successfully...";
         }else {
            echo "Message could not be sent...";
         }	
	}
?>

</div>
</div>
<div id="footer">
<h4> Contact Us @ Team Aurora </h4>
<br Email : abc@gmial.com />
</div>
</div>
</body>
</html>