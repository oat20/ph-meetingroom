<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
	body{
		margin-top:5%;
		background-color: #474747;
	}
</style>
</head>
	<body>

<div class="container">

	<div class="row">
		<div class="col">
			<h1 class="display-3 text-center text-light">PH-Reservations</h1>
		</div>
		<div class="col">
		
			<div class="card">
			  <div class="card-body">
				<div class="list-group list-group-flush">
				  <a href="http://ns2.ph.mahidol.ac.th/room/calendar.php" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1"><i class="fa fa-comments-o fa-fw fa-2x"></i> จองห้องประชุมส่วนกลาง</h5>
					</div>
				  </a>
				  <a href="http://ns2.ph.mahidol.ac.th/app/labcom/" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1"><i class="fa fa-desktop fa-fw fa-2x"></i> จองห้องปฏิบัติการคอมพิวเตอร์</h5>
					</div>
				  </a>
				  <a href="http://ns2.ph.mahidol.ac.th/edu/courseroom/" class="list-group-item list-group-item-action flex-column align-items-start">
					<div class="d-flex w-100 justify-content-between">
						<h5 class="mb-1"><i class="fa fa-graduation-cap fa-fw fa-2x"></i> จองห้องเรียนส่วนกลาง</h5>
					</div>
				  </a>
				</div>
			  </div>
			</div>
			
		</div>
	</div>

</div>

<!--survey-->
<!-- Modal -->
<div class="modal fade" id="modalSurvey" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">แบบประเมินความพึงพอใจ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> ปิด
        </button>
      </div>
      <div class="modal-body">
        <iframe src="https://docs.google.com/forms/d/1juOQjr_-4rTc8r1pvRUGbq40mD_yB9hqX9eyPkla03s/viewform?edit_requested=true" width="100%" height="700"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-link" data-dismiss="modal"><i class="fa fa-times fa-fw"></i> ปิด</button>
      </div>
    </div>
  </div>
</div>

<script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
	$('#modalSurvey').modal('show');
</script>

</body>
</html>