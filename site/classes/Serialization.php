<?php
class Serialization{
	function __construct(){
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = ''; //Define database password
		$dbName = 'stv'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function getRows(){
		$query = mysqli_query($this->connect,"SELECT `ID`, `NAME`, `IS_PAGE`, `SUBMENU` FROM menu WHERE `PERANT_ID` = 0 AND `IN_NAVBAR` = 1 ORDER BY `SERIAL_NO` ASC") or die(mysql_error());
		while($row = mysqli_fetch_assoc($query))
		{
			$rows[] = $row;
		}
		return $rows;
	}
	
	function getRowsByID($id){
		$query = mysqli_query($this->connect,"SELECT `ID`, `NAME`, `IS_PAGE`, `SUBMENU` FROM menu WHERE `PERANT_ID` = $id AND `IN_NAVBAR` = 1 ORDER BY `SERIAL_NO` ASC") or die(mysql_error());
		while($row = mysqli_fetch_assoc($query))
		{
			$rows[] = $row;
		}
		return $rows;
	}
	
	function updateOrder($id_array){
		$count = 1;
		foreach ($id_array as $id){
			$update = mysqli_query($this->connect,"UPDATE `menu` SET `SERIAL_NO` = $count WHERE id = $id");
			$count ++;	
		}
		return true;
	}
        
	function updateOrderStaff($id_array){
		$count = 1;
		foreach ($id_array as $id){
			$update = mysqli_query($this->connect,"UPDATE `staff` SET `SERIAL_NO` = $count WHERE USER_ID = $id");
			$count ++;	
		}
		return true;
	}
        
        
}
?>