<?
function connect_db()
{
	//ติดต่อกับฐานข้อมูล
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
?>