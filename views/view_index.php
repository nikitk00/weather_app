<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<title>Welcome on Nikita's weather app! Choose your city</title>
	</head>
	<body>
		<div class="bgrnd">
			<div class="opsty">
				<div class="container" id="cntnr">
					<form method="get" action="models/model_forecast.php">
						 <div class="form-group">
							<div class="hdr">
								<b>To get weather forecast, please enter your city</b>
							</div>
							<div class="form-group row">
								<label for="example-text-input" class="col-2 col-form-label">City</label>
								<div class="col-9">
								<input list="<идентификатор>" title="Minimum 3 symbols" name="city" class="form-control" placeholder="Enter your city" required pattern=".{3,16}">
									<datalist id="<идентификатор>">
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
		</div>
	</body>
	<footer>
		<div id="ftr">
			&copy;Krizhevskiy 2017
		</div>
	</footer>
	
</html>