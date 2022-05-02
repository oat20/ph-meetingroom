<?
	#$conn = mysql_connect($host, $userhost, $passhost);
	#mysql_select_db($dbhost, $conn);  
	#mysql_query("SET NAMES 'UTF8'");
	
	function connect_db()
{
	$host = "localhost";
	$username = "chakkapan";
	 $password = "shk,g-hk";
	 $database ="phroom";
	$result = mysql_connect($host,$username,$password);
	mysql_query("SET NAMES UTF8"); 
	if(!$result)
		return false;
if(!mysql_select_db($database))
	return false;
return $result;
}
connect_db();
?>