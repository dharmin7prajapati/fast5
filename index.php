<?php
include_once 'dbMySql.php';
$con = new DB_con();
$res=$con->select();
if($res === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PHP Data Update and Delete Using OOP - By Cleartuts</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<script type="text/javascript">
function del_id(id)
{
	if(confirm('Sure to delete this record ?'))
	{
		window.location='delete_data.php?delete_id='+id
	}
}
function edit_id(id)
{
	if(confirm('Sure to edit this record ?'))
	{
		window.location='edit_data.php?edit_id='+id
	}
}
</script>
</head>
<body>
<center>
<div id="header">
	<div id="content">
    <label>PHP Data Update and Delete Using OOP - By Cleartuts</label>
    </div>
</div>
<div id="body">
	<div id="content">
    <table align="center">
    <tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>City</th>
    <th colspan="2">edit/delete</th>
    </tr>
    <?php
	while($row=mysql_fetch_row($res))
	{
			?>
            <tr>
            <td><?php echo $row[1]; ?></td>
            <td><?php echo $row[2]; ?></td>
            <td><?php echo $row[3]; ?></td>
            <td align="center"><a href="javascript:edit_id(<?php echo $row[0]; ?>)"><img src="b_edit.png" alt="EDIT" /></a></td>
            <td align="center"><a href="javascript:del_id(<?php echo $row[0]; ?>)"><img src="b_drop.png" alt="DELETE" /></a></td>
            </tr>
            <?php
	}
	?>
    </table>
    </div>
</div>

<div id="footer">
	<div id="content">
    <hr /><br/>
    <label>By : <a href="http://www.dynamicdreamz.com/">Dynamic Dreamz</a></label>
    </div>
</div>

</center>
</body>
</html>
