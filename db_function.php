<?php 

	$PHP_5 = true ; 
	$DB_Connect=@file('../technote7/data/install/setup_mysql.php');
	$DB_access=explode('|',base64_decode(strrev($DB_Connect[1])));
	$My_DB_Name=$DB_access[4];
	$connect=""; 
	$sql="";

function db_connection(){
	global $PHP_5;
	global $DB_access;
	global $connect;
	if( $PHP_5){
	  $connect=@mysql_connect($DB_access[1],$DB_access[2],$DB_access[3]);
	  mysql_select_db($DB_access[2]);
	  @mysql_query("set names utf8");
	  @mysql_query("set session character_set_connection=utf8;");
	  @mysql_query("set session character_set_results=utf8;");
	  @mysql_query("set session character_set_client=utf8;");

	}else{
	 $connect=mysqli_connect($DB_access[1],$DB_access[2],$DB_access[3],$DB_access[2]);
	//$connect=mysqli_connect("localhost","banpo11","blueline2","banpo11");
		mysqli_query($connect, "set session character_set_connection=utf8;");
		mysqli_query($connect, "set session character_set_results=utf8;");
		mysqli_query($connect, "set session character_set_client=utf8;");
	}
}	
function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
function generateRandomDate(){
	    //Generate a timestamp using mt_rand.
		$timestamp = mt_rand(1, time());
		//Format that timestamp into a readable date string.
		$randomDate = date("d M Y", $timestamp);
		//Print it out.
		return $randomDate;	
}
function db_make_query($arg_sql=NULL){
	global $sql; 
	if($arg_sql ==NULL)$sql="SELECT no,subject,tbody FROM a_tn2_freeboard_list ORDER BY `no` DESC";
	else $sql = $arg_sql ; 
}
function db_exec_query($Cnt=10){
	global $PHP_5;
	global $sql; 
	global $connect;
	if($PHP_5){
		if ($result=mysql_query($sql))
		{
			for( $i = 0; $i < $Cnt; $i++ )
			{
		// while($row =	mysql_fetch_array($result, MYSQL_NUM))	
				$row[$i] = mysql_fetch_array($result, MYSQL_NUM);  
		 //       printf ("%s (%s)\n",$row[$i][0],$row[$i][1]);
		 //		echo "<h3>".$row[$i][0]."</h3>";
		 //		echo $row[$i][1];
			}
		// Free result set
		mysql_free_result($result);
		}
		mysql_close($connect);
	}else{
		if ($result=mysqli_query($connect,$sql))
		{
			for( $i = 0; $i < $Cnt; $i++ )
			{
				$row=mysqli_fetch_row($result);  
		 //       printf ("%s (%s)\n",$row[0],$row[1]);
		 //       echo "<br/>";
			}
			// Free result set
			mysqli_free_result($result);
		}
		mysqli_close($connect);
   }
   return $row; 
}
?>