<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/weather_app/styles/styles.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<title>Welcome on Nikita's weather app! Choose your city</title>
	</head>
	<body>
		<div class="opsty">
			<div class="hdr_city"><a href="/weather_app/"><?php echo $report['name'].', '.$report['country'].'('.round($report['coord']['lat'], 1).', '.round($report['coord']['lon'], 1).')'; ?></a></div>
			<div class="container" id="cntnr_frcs">
<!--				<div class="table">-->
					<table>
					<tr>
						<th>Date</th>
						<?php for($i = 0; $i < 5; $i++){ ?>
						<th><?php echo $report['date'][$i]; ?></th>
						<?php } ?>
					</tr>
					<tr>
						<th></th>
						<?php for($i = 0; $i < 5; $i++){ ?>
						<td><img src="http://openweathermap.org/img/w/<?php echo $report['pic'][$i]; ?>.png"></td>
						<?php } ?>
					</tr>
					<tr>
						<th>Temperature, &#x2103</th>
						<?php for($i = 0; $i < 5; $i++){ ?>
						<td><?php echo $report['temp'][$i]; ?></td>
						<?php } ?>
					</tr>
					<tr>
						<th>Fallout, mm</th>
						<?php for($i = 0; $i < 5; $i++){ ?>
						<td><?php echo ($report['fallout'][$i] > 0 ? $report['fallout'][$i] : '-'); ?></td>
						<?php } ?>
					</tr>
									
					</table>
				
			</div>
			
		</div>
	</body>
	<footer>
		<div id="ftr">
			&copy;Krizhevskiy 2017
		</div>
	</footer>
	
</html>