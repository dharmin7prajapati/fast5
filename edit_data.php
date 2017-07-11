<?php
include_once 'dbMySql.php';
$con = new DB_con();
$table = "users";
// data insert code starts here.
if(isset($_GET['edit_id']))
{
	$sql=mysql_query("SELECT * FROM users WHERE user_id=".$_GET['edit_id']);
	$result=mysql_fetch_array($sql);
}
// data update code starts here.
if(isset($_POST['btn-update']))
{
	$fname = $_POST['first_name'];
	$lname = $_POST['last_name'];
	$city = $_POST['city_name'];
	
	$id=$_GET['edit_id'];
	$res=$con->update($table,$id,$fname,$lname,$city);
	if($res)
	{
		?>
		<script>
		alert('Record updated...');
        window.location='index.php'
        </script>
		<?php
	}
	else
	{
		?>
		<script>
		alert('error updating record...');
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
    <td><input type="text" name="first_name" placeholder="First Name" value="<?php echo $result['first_name']; ?>"  /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" value="<?php echo $result['last_name']; ?>" /></td>
    </tr>
    <tr>
    <td><input type="text" name="city_name" placeholder="City" value="<?php echo $result['user_city']; ?>" /></td>
    </tr>
    <tr>
    <td>
    <button type="submit" name="btn-update"><strong>UPDATE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
</html>