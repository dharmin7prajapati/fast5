<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "users";

// data update code starts here.
if(isset($_POST['btn-insert']))
{
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$city = $_POST['city_name'];
	$con->assignStr("first_name",$fname);
	$con->assignStr("last_name",$lname);
	$con->assignStr("user_city",$city);
	
	if($con->insert($table))
	{
		?>
		<script>
		alert('Record inserted...');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error inserting record...');
        window.location='index.php'
        </script>
		<?php
	}
}
// data update code ends here.

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Data Insert and Select Data Using OOP - By Cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
	<div id="content">
    <label>PHP Data Insert and Select Data Using OOP - By Cleartuts</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td><input type="text" name="first_name" placeholder="First Name" value=""  /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" value="" /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="City" value="" /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-insert"><strong>INSERT</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>
