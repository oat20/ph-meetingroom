<?php
session_start();

include"bookingroom/config.php";
include("bookingroom/inc/function.php");
include("bookingroom/connect/connect.php");
?>

<title><?php echo $sitename;?></title>

<?php
include("bookingroom/css-inc.php");
?>

<!-- Static navbar -->
    <?php include("bookingroom/navbar-inc.php");?>
        
<!--<div class="blank_10"></div>-->    
<div class="container-fluid">

	<!--<p class="text-right">
    	<a href="" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-edit"></i> กรอกใบจอง</a>
    </p>-->

	<div class="row">
    
        <div class="col-sm-12">
                	
            <div class="panel panel-default">
            	<div class="panel-heading clearfix">
                	<h3 class="panel-title pull-left"><i class="fa fa-calendar" aria-hidden="true"></i> ปฏิทิน</h3>
                    <div class="pull-right">
                    	<div class="btn-group" role="group">
                          <a href="calendar.php" class="btn btn-default"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar View</a>
                          <a href="calendar-table.php" class="btn btn-default"><i class="fa fa-table"></i> Table View</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                
                	<?php
					echo '<div class="row">';
					foreach($cf_msgicon2_noicon as $k=>$v){
						echo '<div class="col-lg-4"><p class="activity2 text-center" style="background-color:'.$v["status-color"].'">'.$v['icon'].' '.$v['title'].'</p></div>';
					}
					echo '</div><hr>';
					?>
                    
                    <div id='calendar'></div>
                    
                    <p></p>
                    <div class="well well-sm">
                    	<legend>รายการห้อง</legend>
                        <div class="row">
                        	<?php
							$sql = mysql_query("select * from meetingroom_croom
							where enable = '1'
							order by cr_id asc");
							while($ob = mysql_fetch_assoc($sql)){
								//echo '<li class="list-group-item"><div class="activity2" style="background-color:'.$ob["color"].'">'.$ob["name"].'</div></li>';
								echo '<div class="col-lg-3"><p class="activity2" style="background-color:'.$ob["color"].'"><a href="calendar-room.php?cr_id='.$ob['cr_id'].'">'.$ob["name"].' '.$ob["cr_number"].' '.$ob['location'].' ('.$ob['net'].' ท่าน)</a></p></div>';
							}
							?>
                        </div><!--row-->
                    </div>
                </div><!--panel-body-->
            </div>
                        
        </div>
        <!--col-10-->
        
        <!--<div class="col-sm-2">
        
        	<div class="panel panel-primary">
            	<div class="panel-heading">
                	<h3 class="panel-title"><i class="fa fa-bars" aria-hidden="true"></i> รายการห้อง</h3>
                </div>
  				<div class="panel-body">
                	<?php
					/*$sql = mysql_query("select * from meetingroom_croom
					where enable = '1'
					order by cr_id asc");
					while($ob = mysql_fetch_assoc($sql)){
    					//echo '<li class="list-group-item"><div class="activity2" style="background-color:'.$ob["color"].'">'.$ob["name"].'</div></li>';
						echo '<p class="activity2" style="background-color:'.$ob["color"].'">'.$ob["name"].' '.$ob["cr_number"].' <small>'.$ob['location'].'</small></p>';
					}*/
					?>
  				</div>
            </div>
            
        </div>--><!--col-2-->
        
    </div>
    <!--row-->
	
</div>

  <?php include("bookingroom/js-inc.php");?>
  <script>
  $(function(){

    $('#calendar').fullCalendar({
        header: {
            right: 'prev,next, today, month,agendaWeek,agendaDay',  //  prevYear nextYea
           //center: 'title',
            //right: 'month,agendaWeek,agendaDay'
			//right: 'month,agendaDay',
			left: 'title'
        },  
        buttonIcons:{
            prev: 'left-single-arrow',
            next: 'right-single-arrow',
            prevYear: 'left-double-arrow',
            nextYear: 'right-double-arrow'         
        },       
//        theme:false,
//        themeButtonIcons:{
//            prev: 'circle-triangle-w',
//            next: 'circle-triangle-e',
//            prevYear: 'seek-prev',
//            nextYear: 'seek-next'            
//        },
        firstDay:1,
//        isRTL:false,
//        weekends:true,
//        weekNumbers:false,
//        weekNumberCalculation:'local',
        height:'auto',
//        fixedWeekCount:false,
	allDaySlot:false,
	minTime:'06:00:00',
        events: {
            url: 'bookingroom/fullcalendar/data-event-01.php',
            error: function() {

            }
        },    
        eventLimit:true,
//        hiddenDays: [ 2, 4 ],
        lang: 'th',
        dayClick: function() {
//            alert('a day has been clicked!');
//            var view = $('#calendar').fullCalendar('getView');
//            alert("The view's title is " + view.title);
        }
		//defaultView: 'agendaWeek'
    });
  
    
});
</script>