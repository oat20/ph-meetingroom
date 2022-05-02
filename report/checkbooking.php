<!--<script>
function report() {
	var URL = "report/stat.inc.php";
	var data = getFormData("form1");
	ajaxLoad("post", URL, data, "display");
}
</script>-->
	  <form id="formReport" action="report/stat.inc.php" method="post">
      <table class="table table-bordered table-hover">
      	<tbody>
  <tr>
        	<th class="td3">ตั้งแต่วันที่:</th>
            
            <td class="td3">
            	<div class="row">
                	<div class="col-xs-4">
                    	<div class="form-group">
                    		<?php echo form_selectdate('book_d1', date('d'));?>
                        </div>
                    </div>
                    
                    <div class="col-xs-4">
            	<div class="form-group">
            <?php
			print "<select name='m' class='form-control' required>";
            for($i=1;$i<=12;$i++){
		$j = sprintf("%02d",$i);
				if($j == date("m")){
					print "<option value='".$j."' selected>- ".nameMonth($j)." -</option>";
				}else{
					print "<option value='".$j."'>- ".nameMonth($j)." -</option>";
				}
			}
			print "</select>";
		?>
        		</div>
                	</div>
                    
                    <div class="col-xs-4">
                    	<div class="form-group">
                	<select name="y" class="form-control" required>
            	<?php
				$year_present=date("Y");
				$yc=$year_present+543;
				$ys=$yc-10;
				$yn=$yc+1;
				for($yy=$ys;$yy<=$yn;$yy++){
					if($yy == $yc){
            			print "<option value='".$yy."' selected='selected'>- ".$yy." -</option>";
					}else{
						print "<option value='".$yy."'>- ".$yy." -</option>";
					}
				}
				?>
            </select>
            	</div>
                    </div><!--col-->
                </div><!--row-->
            </td>
        </tr>
  <tr>
    <th class="td3">ถึงวันที่:</th>
    <td class="td3">
    	<div class="row">
        	<div class="col-xs-4">
            	<div class="form-group">
            		<?php echo form_selectdate('book_d2', date('d'));?>
                </div>
            </div>
            
            <div class="col-xs-4">
            	<div class="form-group">
            <?php
			print "<select name='m2' class='form-control' required>";
            for($i=1;$i<=12;$i++){
		$j = sprintf("%02d",$i);
				if($j == date("m")){
					print "<option value='".$j."' selected>- ".nameMonth($j)." -</option>";
				}else{
					print "<option value='".$j."'>- ".nameMonth($j)." -</option>";
				}
			}
			print "</select>";
		?>
        		</div>
            </div><!--col-->
            
        	<div class="col-xs-4">
    	<div class="form-group">
                	<select name="y2" class="form-control" required>
            	<?php
				$year_present=date("Y");
				$yc=$year_present+543;
				$ys=$yc-10;
				$yn=$yc+1;
				for($yy=$ys;$yy<=$yn;$yy++){
					if($yy == $yc){
            			print "<option value='".$yy."' selected='selected'>- ".$yy." -</option>";
					}else{
						print "<option value='".$yy."'>- ".$yy." -</option>";
					}
				}
				?>
            </select>
            	</div>
                	</div>
                </div><!--row-->
            </td>
    </tr>
  <tr>
    <th class="td3">&nbsp;</th>
    <td class="td3"><input type="submit" value="แสดงรายงาน" class="btn formbutton btn-block"/></td>
  </tr>
  		</tbody>
      </table>
</form>
