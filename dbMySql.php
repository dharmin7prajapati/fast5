<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','mvc');

class DB_con
{
	public $link_id;

	public $result;

	public $col;

	public $query;

	public $fields;
	
	function __construct()
	{
		$conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS) or die('localhost connection problem'.mysql_error());
		mysql_select_db(DB_NAME, $conn);
	}
	
	public function error($msg)
	{
		echo '<div style="border:2px solid black;font-family:tahoma;font-size:16px;padding:20px;text-align:center;color:yellow;background-color:#CC0000;">'.htmlspecialchars($msg).'</div>';
		
		$msg = date("c")."\n".$this->query."\n\n".mysql_error($this->link_id)."\n\n";

		if (defined("DEVMODE"))
		{
			echo '<div style="border:2px solid black;font-family:tahoma;font-size:16px;padding:20px;color:yellow;background-color:#CC0000;">'.nl2br($msg).'</div>';
		}
	
		die();	

	}
	
	public function assign($field, $value)
	{
		$this->fields[$field] = ($value)==""?("'".$value."'"):$value;
	}


	public function assignStr($field, $value)
	{
		$this->fields[$field] = "'".$this->escape($value)."'";
	}
	
	public function escape($str)
	{
		return mysql_real_escape_string($str);
	}
	
	public function reset()
	{
		$this->fields = array();
	}
	
	public function insert($table)
	{
		$f = "";
		$v = "";

		reset($this->fields);
		
		foreach($this->fields as $field=>$value){
			
			$f.= ($f!=""?", ":"").$field;
			$v.= ($v!=""?", ":"").$value;

		}
		
		$sql = "INSERT INTO ".$table." (".$f.") VALUES (".$v.")";
		//echo $sql;die;
		$this->query($sql);
		return mysql_insert_id();		
	}
	
	public function select()
	{
		$res=mysql_query("SELECT * FROM users");
		return $res;
	}
	public function delete($table,$id)
	{
		$res = mysql_query("DELETE FROM $table WHERE user_id=".$id);
		return $res;
	}
	public function update($table,$id,$fname,$lname,$city)
	{
		$res = mysql_query("UPDATE $table SET first_name='$fname', last_name='$lname', user_city='$city' WHERE user_id=".$id);
		return $res;
	}
	
	public function query($_query)
	{

		$this->query = $_query;

		$this->result = @mysql_query($_query) or die(mysql_error());

		return $this->result; 
	}
	
	public function insertId()

	{

		return @mysql_insert_id($this->link_id);

	}
	
}

?>
