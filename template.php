<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Contact</a></li>
				<?php
				
				if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'admin') {
					echo '<li><a href="admin.php">Admin Panel</a></li>';
				}
				?>
			</ul>
		</nav>
	</header>	
	<main>
	<h1>Welcome to My Website</h1>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget nibh lorem. Nam tincidunt felis et finibus commodo. Nulla facilisi. Suspendisse in erat ac nisl lobortis commodo nec a turpis. Sed ullamcorper ante euismod, eleifend tortor in, venenatis nibh. Quisque bibendum aliquam libero sit amet convallis. Nulla vitae maximus nisi. Cras feugiat justo in tellus semper, sit amet consequat nulla faucibus. Morbi laoreet, leo a vulputate faucibus, diam quam venenatis lacus, in consequat nibh justo et ex. Integer laoreet pellentesque est ac vestibulum. Morbi lacinia, enim non vestibulum commodo, velit velit ultricies nunc, id pretium lacus purus ac lectus. Sed eget tincidunt urna. Fusce eget sapien in nibh lacinia bibendum.</p>
	</main>

	<footer>
		<p>&copy; My Website 2023</p>
	</footer>
		
</body>
</html>