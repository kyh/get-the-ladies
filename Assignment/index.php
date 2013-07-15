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

	if ($_GET['likebox'] && $_GET['likebox'] == 'ilike') {
		$likedline = $_GET['pickupline'];
		savetofile($likedline);

		echo("SAVED");

	}

	function savetofile ($pline) {
		$file="saved.txt";
		file_put_contents($file, $pline, FILE_APPEND | LOCL_EX);
		
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
<form>
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
				
				echo ('<input type="text" name="pickupline" size="150" value="' . $categorized[$rand1] . '">');
				
			}else {	


				echo('<input type="text" name="pickupline" size="150" value="' . $pickUp->joke[$rand]->title . '">');

			}
		?>

	
		<input type="radio" name="category" value="all" <?php if ($category=="all") echo 'checked="checked"'?>  /> All<br>
		<input type="radio" name="category" value="nerdy" <?php if ($category=="nerdy") echo 'checked="checked"'?> /> Nerdy Pickup Lines<br>
		<input type="radio" name="category" value="cheesy" <?php if ($category=="cheesy") echo 'checked="checked"'?> />Cheesy Pickup Lines <br>
		<input type="radio" name="category" value="Ridiculous" <?php if ($category=="Ridiculous") echo 'checked="checked"'?> />Ridiculous Pickup Lines <br>
		<input type="submit" value="New Line">
		<input type="checkbox" name="likebox" value="ilike"> I like this! <br>

	</form>

	<form action="saved.php"> 
		<input type="submit" value="View Saved Lines">
	</form>


	


	</section>
</body>
</html>