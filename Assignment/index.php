<?php
	$pickUp = simplexml_load_file('pickUpLines.xml');
	$rand = rand(0, 5); //random number from 0-5
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>How to get the ladies.</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<section id="main">
		<?php
			echo('<p>' . $pickUp->joke[$rand]->title . '</p>');
		?>
	</section>
</body>
</html>