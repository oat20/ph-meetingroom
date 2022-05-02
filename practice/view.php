<div class="alert alert-warning">
  <h4><i class="fa fa-info"></i> ข้อปฏิบัติการจอง</h4>
  <?php
  $rsPractice=mysql_query("select * from meetingroom_practice
  where pr_use='Yes'
  order by pr_order asc");
  while($obPractice=mysql_fetch_assoc($rsPractice)){
	  echo '<p class="font16">'.$obPractice['pr_order'].'. '.$obPractice['pr_title'].'</p>';
  }
  ?>
</div>