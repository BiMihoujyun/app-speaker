<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login/Register - GGxrdGP</title>
	<!-- Description, Keywords and Author -->
	<meta name="description" content="Your description">
	<meta name="keywords" content="Your,Keywords">
	<meta name="author" content="ResponsiveWebInc">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Styles -->
	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<?php echo $this->Html->css('bootstrap.min'); ?>

	<!-- Font awesome CSS -->
	<?php echo $this->Html->css('font-awesome.min'); ?>

	<!-- Custom CSS -->
	<?php echo $this->Html->css('style'); ?>

	<!--[if IE]>
	<?php echo $this->Html->css('style-ie'); ?>

	<![endif]-->
	<?php
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');
	?>
	<!-- Favicon -->
	<link rel="shortcut icon" href="#">
</head>


<body>
	<div class="out-container">
		<?php //echo $this->element('navbar'); ?>

		<div class="side">
			<?php //echo $this->element('side'); ?>
		</div>

		<div class="main">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div><!-- /main -->
	</div><!-- /wrapper-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<?php echo $this->Html->script('jquery.js'); ?>
	<?php echo $this->Html->script('bootstrap.min.js'); ?>
	<?php echo $this->Html->script('respond.min.js'); ?>
	<?php echo $this->Html->script('html5shiv.js'); ?>
	<?php echo $this->fetch('script'); ?>

  </body>
</html>