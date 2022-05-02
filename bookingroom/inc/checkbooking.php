    <link rel="stylesheet" type="text/css" media="all" href="bookingroom/inc/datepicker/themes/aqua.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/utils.js"></script>
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/calendar.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/calendar-th.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="bookingroom/inc/datepicker/script/calendar-setup.js"></script>

        <div class="module1">
	  <h3>ค้นหาการจอง</h3>
      <!--<form method="get" onsubmit="NewWin=window.open('stat.inc.php?startdate=<?php echo $startdate; ?>','NewWin','toolbar=no,status=no,width=800,height=600'); "> -->
	  <form action="booking.php" method="get" enctype="multipart/form-data">
      <strong>วันเริ่ม</strong><br/>
      <input type="text" name="keyDater" id="sel5" size="20" readonly="true" value="<?php echo $startdate; ?>" class="forminput"><input type="reset" value="เลือกวัน" id='button5' onclick="alert('click');" class="formbutton"> 
                      <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "sel5",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "button5",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		</script>
       <p>&nbsp;</p>
        
        <strong>วันสิ้นสุด</strong><br/>
        <input type="text" name="keyenddate" id="keyenddate" size="20" readonly="true" value="<?php echo $startdate; ?>" class="forminput"><input type="reset" value="เลือกวัน" id='keyenddate2' onclick="alert('click');" class="formbutton"> 
                      <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({
		
		inputField     :    "keyenddate",     // id of the input field
		ifFormat       :    "%Y-%m-%d",     // format of the input field
		showsTime      :     false,
		button         :    "keyenddate2",// trigger button (well, IMG in our case)
		align          :    "Tl"           // alignment (defaults to "Bl")
		
		});
		</script>
        <p>&nbsp;</p>
        
        <input type="submit" value="ค้นหา" class="formbutton" />
		</form>
	  </div>
      <div class="line"></div>
