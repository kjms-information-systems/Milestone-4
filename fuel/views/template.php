<!DOCTYPE html>
<html lang='en'>

<head>
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('m2.css'); ?>
	<meta charset='utf-8'>
	<meta name = "viewport" content = "width = device-width, initial-scale = 1">
	
</head>

<body>
	<header>
		<h1>KJMS Information Systems</h1>
    <div class="topnav">
        <ul>
            <a href='/~kmlindgr/ct310/m4/'>Home</a>
            <a href='<?php echo Uri::create('index.php/m4/about'); ?>'>About Us</a>
            <a href='<?php echo Uri::create('index.php/m4/moreinformation'); ?>'>Info</a>
            <a href='<?php echo Uri::create('index.php/m4/vbp_modeling'); ?>'>VBP Modeling</a>
	    <a href=<?php echo Uri::create('index.php/m4/login'); ?>>Login</a>
	    <a href=<?php echo Uri::create('index.php/m4/logout'); ?>>Logout</a>
	    <a href=<?php echo Uri::create('index.php/m4/management'); ?>>Management</a>
	    
        </ul>
    </div>
	</header>
	<div id='main' class='container'>
		<h2><?php echo $subtitle;?></h2>
		<?php echo $content; ?>
		<br>
        <footer>
        Part of a <a href="https://www.cs.colostate.edu/~ct310">CT310</a> course project<br>
		<small>&copy; Copy Right <?php echo date('Y');?> Kiera Lindgren, Marvin Enriquez, Josette Grinslade, Scott Sparks</small>
	</footer>
	</div>
	
</body>

</html>
