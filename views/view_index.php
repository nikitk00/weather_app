<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<title>Welcome on Nikita's weather app! Choose your city</title>
	</head>
	<body>
		<div class="opsty">
			<div class="container" id="cntnr">
				<form method="post" action="models/model_forecast.php">
					 <div class="form-group">
					 	<div class="hdr">
					 		<b>To get weather forecast, please enter your city</b>
					 	</div>
					 	<div class="form-group row">
							<label for="example-text-input" class="col-2 col-form-label">City</label>
							<div class="col-9">
							<input list="<идентификатор>" name="city" class="form-control" placeholder="Enter your city">
								<datalist id="<идентификатор>">
									<option value="test"></option>
									<?php for($i = 0; $i < sizeof($cts)/10000; $i++){ ?>
										<option value="<?php echo $cts[$i]->name; ?>"></option>
									<?php } ?>
								</datalist>
							</div>
						</div>
						
						<button type="sumit" class="btn btn-primary">Get forecast</button>
					</div>
				</form>
				
			</div>
		</div>
	</body>
	<footer>
		<div id="ftr">
			&copy;Krizhevskiy 2017
		</div>
	</footer>
	
</html>