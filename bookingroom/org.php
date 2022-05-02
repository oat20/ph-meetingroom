<?php 
	ob_start();
	session_start();
	 include"config.php";
	 include"connect/connect.php";
	 include"inc/function.php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"><html><!-- InstanceBegin template="/Templates/index.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
<title>&#3650;&#3611;&#3619;&#3649;&#3585;&#3619;&#3617;&#3585;&#3634;&#3619;&#3592;&#3629;&#3591;&#3627;&#3657;&#3629;&#3591;&#3648;&#3619;&#3637;&#3618;&#3609;</title>
<!-- InstanceEndEditable -->
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<link href="theme/room_it/style.css" rel="stylesheet" type="text/css">
<link href="theme/style.css" rel="stylesheet" type="text/css">
<link href="theme/login.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
        var GB_ROOT_DIR = "./GreyBox/greybox/";
    </script>
<script type="text/javascript" src="GreyBox/greybox/AJS.js"></script>
    <script type="text/javascript" src="GreyBox/greybox/AJS_fx.js"></script>
    <script type="text/javascript" src="GreyBox/greybox/gb_scripts.js"></script>
    <link href="GreyBox/greybox/gb_styles.css" rel="stylesheet" type="text/css" media="all" />
    
    <link rel="stylesheet" type="text/css" media="all" href="inc/datepicker/themes/aqua.css" title="Calendar Theme - forest.css" >
<!-- import the calendar script -->
		<script type="text/javascript" src="inc/datepicker/script/utils.js"></script>
		<script type="text/javascript" src="inc/datepicker/script/calendar.js"></script>
<!-- import the language module -->
		<script type="text/javascript" src="inc/datepicker/script/calendar-th.js"></script>
<!-- other languages might be available in the lang directory; please check
		your distribution archive. -->
<!-- import the calendar setup script -->
		<script type="text/javascript" src="inc/datepicker/script/calendar-setup.js"></script>
<!-- InstanceBeginEditable name="head" --><!-- InstanceEndEditable -->
</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0" onload="init();">
<div id="warp">
<!-- ImageReady Slices (Untitled-1) -->
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="100" colspan="2"><div align="left">
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><img src="theme/room_it/images/logo.png" width="300" height="100"></td>
          <td align="right"><!--<h2 class="style1">&#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660; &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;&#3621; </h2> -->
          <div id="profile">
          	<!-- InstanceBeginEditable name="profile" -->profile<!-- InstanceEndEditable -->          
          </div>
          </td>
        </tr>
      </table>
      </div></td>
  </tr>
  <tr>
    <td valign="top" width="200"><img src="theme/room_it/images/life.png" width="200" height="200"><br/>
    <div id="left">
    	<div class="menu">
        	<!-- InstanceBeginEditable name="leftmodule" --><?php include"inc/menu.inc.php"; ?><!-- InstanceEndEditable -->
        </div>
    </div>
    <br>
    <br></td>
    <td width="750" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="27"><img src="theme/room_it/images/tb/images/1_01.png" width="27" height="26"></td>
        <td background="theme/room_it/images/tb/images/1_02.png"></td>
        <td width="26"><img src="theme/room_it/images/tb/images/1_03.png" width="26" height="26"></td>
      </tr>
      <tr>
        <td background="theme/room_it/images/tb/images/1_05.png" width="27"></td>
        <td bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="maincontent" -->
		<?php
			switch($mode){
				case "editorg" : include"department/editorg.php"; break;
				default : include"department/show_dep.inc.php"; break; 
			}
		?>
		<!-- InstanceEndEditable --></td>
        <td background="theme/room_it/images/tb/images/1_07.png">&nbsp;</td>
      </tr>
      <tr>
        <td width="27"><img src="theme/room_it/images/tb/images/1_08.png" width="27" height="23"></td>
        <td background="theme/room_it/images/tb/images/1_09.png" bgcolor="#FFFFFF">&nbsp;</td>
        <td background="theme/room_it/images/tb/images/1_07.png"><img src="theme/room_it/images/tb/images/1_10.png" width="26" height="23"></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top"><div class="style2">Revised: Copyright @ 2008, &#3588;&#3603;&#3632;&#3626;&#3634;&#3608;&#3634;&#3619;&#3603;&#3626;&#3640;&#3586;&#3624;&#3634;&#3626;&#3605;&#3619;&#3660;,   &#3617;&#3627;&#3634;&#3623;&#3636;&#3607;&#3618;&#3634;&#3621;&#3633;&#3618;&#3617;&#3627;&#3636;&#3604;&#3621;, Webmaster.<BR>
    420/1 &#3606;&#3609;&#3609;&#3619;&#3634;&#3594;&#3623;&#3636;&#3606;&#3637; &#3648;&#3586;&#3605;&#3619;&#3634;&#3594;&#3648;&#3607;&#3623;&#3637; &#3585;&#3619;&#3640;&#3591;&#3648;&#3607;&#3614;&#3631; 10400.&#3650;&#3607;&#3619;   0-2354-8543 </div></td>
  </tr>
</table>
<p>&nbsp;</p>
<!-- End ImageReady Slices -->
</div>
</body>
<!-- InstanceEnd --></html>
<?php
ob_end_flush();
?>