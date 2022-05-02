<?php
    header("Content-Type: text/plain; charset=TIS-620");
	
	$names=$_GET[names];

    //ข้อมูลเกี่ยวกับฐานข้อมูลที่ใช้
    $DBServer = "localhost";
    #$DBName = "ph_bookingroom";
    $DBUsername = "root";
    $DBPassword = "root";
	
    $conn=mysql_connect( $DBServer, $DBUsername, $DBPassword ) or die( "ไม่สามารถติดต่อกับMySQLได้");
    #mysql_select_db( $DBName, $conn ) or die( "ไม่สามารถเลือกใช้ฐานข้อมูล $dbname ได้" );
	mysql_query("set names tis620"); 

	$sql_select="select tt_course.fullname, tt_course.idnumber 
	from phad_timetable.tt_course 
	where tt_course.fullname like '%$names%' or tt_course.idnumber like '%$names%' 
	order by teacher asc";
    $result1= mysql_query( $sql_select, $conn );

   //เริ่มวนรอบแสดงข้อมูล
   while ($result = mysql_fetch_array($result1))

   //แสดงค่าในฐานข้อมูล
   {	  		 
	    echo $result[idnumber]." ".$result[fullname]."<br/>";	
   }
    
   //ปิดการเชื่อมต่อฐานข้อมูล
	mysql_close();
?>
