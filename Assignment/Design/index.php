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
		<nav class="menu" id="menu">
			<h3>Categories</h3>
			<a href="#">Cheesy</a>
			<a href="#">Disney</a>
			<a href="#">Gross</a>
			<a href="#">Nerdy</a>
			<a href="#">Rude</a>
			<a href="#">Valantines</a>
		</nav>
		<div class="buttonContainer">
			<!-- Class "menu-open" gets applied to menu -->
			<button id="showMenu"><div class="arrow" aria-hidden="true" data-icon="&#xe104;"></div></button>
		</div>
		<div class="saveContainer">
			<button id="saveJoke"><div class="save" aria-hidden="true" data-icon="&#xe06a;"></div></button>
		</div>
		<div class="container">
			<input type="text" readonly="readonly" class="pickUpLine" value="Would you grab my arm so I can tell my friends I’ve been touched by an angel"></input>
			<button id="heartContainer">
				<div id="heart"></div>
			</button>
		</div>
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="js/classie.js"></script>
		<script>
			var menu = document.getElementById( 'menu' ),
				showMenu = document.getElementById( 'showMenu' ),
				body = document.body;

			showMenu.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( menu, 'menu-open' );
			};

		</script>
	</body>
</html>
