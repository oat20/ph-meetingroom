<?php
    header("Content-Type: text/plain; charset=TIS-620");
	
	$names=$_GET[names];

    //����������ǡѺ�ҹ�����ŷ����
    $DBServer = "localhost";
    #$DBName = "ph_bookingroom";
    $DBUsername = "root";
    $DBPassword = "root";
	
    $conn=mysql_connect( $DBServer, $DBUsername, $DBPassword ) or die( "�������ö�Դ��͡ѺMySQL��");
    #mysql_select_db( $DBName, $conn ) or die( "�������ö���͡��ҹ������ $dbname ��" );
	mysql_query("set names tis620"); 

	$sql_select="select tt_course.fullname, tt_course.idnumber 
	from phad_timetable.tt_course 
	where tt_course.fullname like '%$names%' or tt_course.idnumber like '%$names%' 
	order by teacher asc";
    $result1= mysql_query( $sql_select, $conn );

   //�����ǹ�ͺ�ʴ�������
   while ($result = mysql_fetch_array($result1))

   //�ʴ����㹰ҹ������
   {	  		 
	    echo $result[idnumber]." ".$result[fullname]."<br/>";	
   }
    
   //�Դ����������Ͱҹ������
	mysql_close();
?>
