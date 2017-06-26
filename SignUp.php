<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="CSS/Layout.css" rel="stylesheet" type="text/css" />
<link href="CSS/SignUpForm.css" rel="stylesheet" type="text/css" />
<title>Sign Up</title>
</head>
<body>
<div id="Holder">
<div id="Header"> </div>
<div id="Content"> 
<div id="PageHeading">
  <h1>Sign Up!</h1>
</div>
<div id="Message">
<h2> Fill all the fields! </h2>
<h2> Use a valid email address! </h2>

</div>
<div id="Detail">
<h2 id="DetailHeader"> Enter Your Details! </h2>

<form> 
<table align="center"> 
<tr>
	<td width="250" height="35"> <label for="firstName"> First Name </label> </td>
    <td width="250" height="35"> <label for="lastName"> Last Name </label> </td>
</tr>
<tr>
	<td height="25"> <input type="text" id="firstName" name="firstName"/> </td>
    <td height="25"> <input type="text" id="lastName" name="lastName"/> </td>
</tr>
<tr>
	<td width="250" height="35"> <label for="empID"> Employ ID </label> </td>
    <td width="250" height="35"> <label for="email"> E-Mail </label> </td>
</tr>
<tr>
	<td height="25"> <input type="number" id="empID" name="empID"/> </td>
    <td height="25"> <input type="email" id="email" name="email"/> </td>
</tr>
<tr>
	<td width="250" height="35"> <label for="firstName"> Password </label> </td>
    <td width="250" height="35"> <label for="lastName"> Confirm Password </label> </td>
</tr>
<tr>
	<td height="25"> <input type="password" id="pswd" name="pswd"/> </td>
    <td height="25"> <input type="password" id="cnfmpswd" name="cnfmpswd"/> </td>
</tr>
</table>
<button> Sign Up </button>
</form>
 </div>
</div>
<div id="footer"></div>
</div>
</body>
</html>