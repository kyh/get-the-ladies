<?php
	$pickUp = simplexml_load_file('pickUpLines.xml');
	$rand = rand(0, 59); //random number from 0-60

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

	// Code Below checks if the user has checked the "like" check box. 
	if ($_GET['likebox'] && $_GET['likebox'] == 'ilike') {
		$likedline = $_GET['pickupline'];
		savetofile($likedline);
		echo("SAVED");

	}

	//Function takes the pickup up and saves it to a file. 
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
				
				// Code below is triggered if a category is chosen. It then goes through the xml file and saves all jokes 
				// that fit in that category. It then spits out a random joke form that category. 
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
				//Displays ALL pickup lines. 
				echo('<input type="text" name="pickupline" size="150" value="' . $pickUp->joke[$rand]->title . '">');

			}
		?>

		<br>
		<input type="radio" name="category" value="all" <?php if ($category=="all") echo 'checked="checked"'?>  /> All<br>
		<input type="radio" name="category" value="nerdy" <?php if ($category=="nerdy") echo 'checked="checked"'?> /> Nerdy Pickup Lines<br>
		<input type="radio" name="category" value="cheesy" <?php if ($category=="cheesy") echo 'checked="checked"'?> />Cheesy Pickup Lines <br>
		<input type="radio" name="category" value="Gross" <?php if ($category=="Gross") echo 'checked="checked"'?> />Gross Pickup Lines <br>
		<input type="radio" name="category" value="Rude" <?php if ($category=="Rude") echo 'checked="checked"'?> />Rude Pickup Lines <br>
		<input type="radio" name="category" value="Valentines" <?php if ($category=="Valentines") echo 'checked="checked"'?> />Valentines Pickup Lines <br>
		<input type="radio" name="category" value="Disney" <?php if ($category=="Disney") echo 'checked="checked"'?> />Disney Pickup Lines <br>

		<input type="submit" value="New Line">
		<input type="checkbox" name="likebox" value="ilike"> I like this! <br>

	</form>

	<form action="saved.php"> 
		<input type="submit" value="View Saved Lines">
	</form>


	


	</section>
</body>
</html>