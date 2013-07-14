<?php
	$pickUp = simplexml_load_file('pickUpLines.xml');
	$rand = rand(0, 5); //random number from 0-5

	if ( $_GET['category'] && $_GET['category'] != '' ) {
		$category = $_GET['category'];
	
		echo("$category");

		if ($category=="all") {
			$flag=false;
	}
	else {
		$flag = true;
	}
}
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
			if($flag) {
				// echo ('A Radio Button is clicked!');
				$categorized = array();

				for ($x=0; $x<=count($pickUp); $x++)
				{
					if ($pickUp->joke[$x]->category == "$category")
					{
						$line = $pickUp->joke[$x]->title;
						array_push($categorized, $line);
					}

				}

				$rand1 = rand(0, count($categorized)-1);
				echo ($categorized[$rand1]);
				
			}else {	

				echo('<p>' . $pickUp->joke[$rand]->title . '</p>');
			}
		?>

	<form action="index.php">
		<input type="submit" value="New Line">	
	</form>


	<form>
		<input type="radio" name="category" value="all" <?php if ($category=="all") echo 'checked="checked"'?> /> All<br>
		<input type="radio" name="category" value="nerdy" <?php if ($category=="nerdy") echo 'checked="checked"'?> /> Nerdy Pickup Lines<br>
		<input type="radio" name="category" value="cheesy" <?php if ($category=="cheesy") echo 'checked="checked"'?> />Cheesy Pickup Lines
		<input type="submit" value="submit">
	</form>

	<form>
		<input type="submit" value="I Like this!">
	</form>

	</section>
</body>
</html>