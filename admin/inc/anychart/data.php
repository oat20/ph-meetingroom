<?php 

	// This script gets data from MySQL Database and
	// puts it into AnyChart XML format
	// this script is used in index.html file
	// to show chart using AnyChart.

	// set XML as output format for this script.

	header('content-type:text/xml');

	// configure connection to your database
	// data from dump.sql should be added to
	// your database in order for this sample
	// to work 

	$MYSQL['host'] = 'localhost';
	$MYSQL['user'] = 'root';
	$MYSQL['password'] = 'root';
	$MYSQL['database'] = 'phlabcom'; 

	$connect = mysql_connect($MYSQL['host'],$MYSQL['user'],$MYSQL['password']);
	mysql_select_db($MYSQL['database'], $connect);
	mysql_query("set names utf8");

	// Note: the same idea can be used for 
	// connecting with any other database.

	// Select all products from anychart_sample_products
	/*$res = mysql_query("select count(meetingroom_userq.uq_id) as a,organization.Fname as b
from meetingroom_userq,organization,jos_users
where meetingroom_userq.u_id=jos_users.id
and jos_users.DeID=organization.DeID
group by b
order by organization.DeID asc", $connect);*/
	$res=mysql_query("select count(meetingroom_userq.uq_id) as a,meetingroom_croom.name as b
from meetingroom_userq,meetingroom_croom
where meetingroom_userq.cr_id=meetingroom_croom.cr_id
group by b
order by meetingroom_croom.cr_id asc" ,$connect);

	#$products = Array();

	// Create a string with data section
	$data = '<data>';

	// Loop through all products
	#while ($product = mysql_fetch_assoc($res))
	#$products[] = $product;

	#for ($i = 0;$i<count($products);$i++) {

		#$product = $products[$i];

		// Open series node 
		$data .= '<series name="'.$product['name'].'">';

		// Make a query to MySQL
		#$productOrders = mysql_query('SELECT * FROM `anychart_sample_orders` WHERE product_id='.$product['id'].' ORDER BY `date` ASC', $connect);

		// Fetch rows from server
 		while ($order = mysql_fetch_array($res)){ 
			// create points in series
		  	$data .= '<point name="'.$order['b'].'" y="'.$order['a'].'" />';
	}
		// Close series node
		$data .= '</series>';  

		#}

	// Close data node
	$data .= '</data>';

	mysql_close($connect);

// Chart Settings XML
?>
<anychart>
  <settings>
    <animation enabled="True"/>
  </settings>
  <charts>
    <chart plot_type="Pie">
      <data_plot_settings enable_3d_mode="false">
        <pie_series>
          <tooltip_settings enabled="true">
            <format>
                <![CDATA[{%Name}
{%Value}
{%YPercentOfSeries}{numDecimals: 2}%]]>
            </format>
            <background>
              <corners type="Rounded" all="3"/>
            </background>
          </tooltip_settings>

          <label_settings enabled="true" mode="Outside" multi_line_align="Center">
            <background enabled="false"/>
            <position anchor="Center" valign="Center" halign="Center" padding="20"/>
            <format>
                <![CDATA[{%Name}
{%Value} ({%YPercentOfSeries}{numDecimals:1}%)]]>
            </format>
            <font bold="False"/>
            <states>
              <hover>
                <font underline="true"/>
              </hover>
            </states>
          </label_settings>
          <connector color="Black" opacity="0.4"/>
        </pie_series>
      </data_plot_settings>
      <?php print $data; ?>
      <chart_settings>
        <title enabled="true" padding="15">
          <text></text>
        </title>
      </chart_settings>
    </chart>
  </charts>
</anychart>