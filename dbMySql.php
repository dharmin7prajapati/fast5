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
		$this->query($sql);
		return $this->insertId();
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

		$this->result = @mysql_query($_query, $this->link_id)

			or $this->error("Can not execute database query. Please contact site administrator. ".(defined("DEV_MODE")&&DEV_MODE?"<br/>".htmlspecialchars($_query):""));

		return $this->result; 
	}
	public function insertId()

	{

		return @mysql_insert_id($this->link_id);

	}
	
}

?>
