<?php
	$pickUp = simplexml_load_file('pickUpLines.xml');
	$rand = rand(0, 59); //random number from 0-60
	if ( $_GET['category'] && $_GET['category'] != '' ) {
		$category = $_GET['category'];
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

<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<title>How to get the Ladies</title>
		<link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/modernizr.custom.js"></script>
	</head>
	<body>
		<div class="buttonContainer">
			<!-- Class "menu-open" gets applied to menu -->
			<button id="showMenu"><div class="arrow" aria-hidden="true" data-icon="&#xe104;"></div></button>
		</div>
		<nav class="saveMenu" id="saveMenu">
			<ul>
				<li>Save</li>
				<li>Show</li>
			</ul>
		</nav>
		<div class="saveContainer">
			<button id="showSaveMenu"><div class="save" aria-hidden="true" data-icon="&#xe06a;"></div></button>
		</div>
		<section class="main">
			<form>
				<nav class="menu" id="menu">
				<h3>Categories</h3>
					<input type="radio" name="category" value="all" id="allCat"><label for="allCat">All</label>
					<input type="radio" name="category" value="cheesy" id="cheesyCat" <?php if ($category=="cheesy") echo 'checked="checked"'?>><label for="cheesyCat">Cheesy</label>
					<input type="radio" name="category" value="Disney" id="disCat" <?php if ($category=="Disney") echo 'checked="checked"'?>><label for="disCat">Disney</label>
					<input type="radio" name="category" value="Gross" id="grossCat" <?php if ($category=="Gross") echo 'checked="checked"'?>><label for="grossCat">Gross</label>
					<input type="radio" name="category" value="nerdy" id="nerdCat" <?php if ($category=="nerdy") echo 'checked="checked"'?>><label for="nerdCat">Nerdy</label>
					<input type="radio" name="category" value="Rude" id="rudeCat" <?php if ($category=="Rude") echo 'checked="checked"'?>><label for="rudeCat">Rude</label>
					<input type="radio" name="category" value="Valentines" id="valCat" <?php if ($category=="Valentines") echo 'checked="checked"'?>><label for="valCat">Valentines</label>
				</nav>
				<?php
					if($flag) {
						// echo ('A Radio Button is clicked!');
						// Code below is triggered if a category is chosen. It then goes through the xml file and saves all jokes 
						// that fit in that category. It then spits out a random joke form that category. 
						$categorized = array();
							for ($x=0; $x<=count($pickUp); $x++) {
								if ($pickUp->joke[$x]->category == "$category") {
									$line = $pickUp->joke[$x]->title;
									array_push($categorized, $line);
								}
							}
						$rand1 = rand(0, count($categorized)-1);
						echo ('<div class="pickUpLine"><span id="theJoke">' . $categorized[$rand1] . '</span></div>');
							}else {	
						//Displays ALL pickup lines. 
						echo('<div class="pickUpLine"><span id="theJoke">' . $pickUp->joke[$rand]->title . '</span></div>');
					}
				?>
				<button id="heartContainer"></button>
			</form>
		</section>
		<section id="social">
			<ul class="socialIco">
				<li><a href="https://twitter.com/intent/tweet?button_hashtag=gettheladies" class="sb" id="twitter">Twitter</a>
					<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
				<li><a href="pickUpLines.xml" class="sb" id="rss" target="_blank">Rss</a>
			</ul>
		</section>
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script>
			var menu = document.getElementById( 'menu' ),
				savedMenu = document.getElementById( 'saveMenu' ),
				showMenu = document.getElementById( 'showMenu' ),
				showSaved = document.getElementById( 'showSaveMenu' ),
				body = document.body;

			showMenu.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menu, 'menu-open' );
			};

			showSaved.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( savedMenu, 'saveMenu-open' );
			};
		</script>
	</body>
</html>
