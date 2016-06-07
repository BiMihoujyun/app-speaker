<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>GGxrdGP</title>
    <!-- Description, Keywords and Author -->
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your,Keywords">
    <meta name="author" content="ResponsiveWebInc">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Styles -->
    <!-- jQuery UI -->
    <?php echo $this->Html->css('jquery-ui'); ?>

    <!-- Bootstrap CSS -->
    <?php echo $this->Html->css('bootstrap.min'); ?>


    <!-- jQuery Gritter -->
    <?php echo $this->Html->css('jquery.gritter'); ?>

    <!-- Bootstrap Switch -->
    <?php echo $this->Html->css('bootstrap-switch'); ?>

    <!-- jQuery Datatables -->
    <?php echo $this->Html->css('jquery.dataTables'); ?>

    <!-- Rateit -->
    <?php echo $this->Html->css('rateit'); ?>

    <!-- jQuery prettyPhoto -->
    <?php echo $this->Html->css('prettyPhoto'); ?>

    <!-- Full calendar -->
    <?php echo $this->Html->css('fullcalendar'); ?>

    <!-- Font awesome CSS -->
    <?php echo $this->Html->css('font-awesome.min'); ?>

    <!-- Custom CSS -->
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('bootstrap-slider'); ?>
    <?php echo $this->Html->css('bootstrap-colorpicker'); ?>


    <!--[if IE]>
    <?php echo $this->Html->css('style-ie'); ?>

    <![endif]-->
    <?php
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
    <!-- Favicon -->
    <link rel="shortcut icon" href="#">
</head>

<body>



<div class="out-container">
    <div class="outer">
        <?php //echo $this->element('navbar'); ?>

        <div class="side">
            <?php echo $this->element('side'); ?>
        </div>
        <!-- Mainbar starts -->
        <div class="mainbar">
            <!-- Page heading starts -->
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            <!-- Content ends -->
        </div>
        <!-- Mainbar ends -->
        <?php echo $this->element('footer'); ?>

        <!-- /main -->
    </div><!-- /wrapper-->

    <!-- Content ends -->

</div>
<!-- Mainbar ends -->

<!-- ////////////////////////////////// -->

<!-- Sliding boxes ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span>

<!-- Javascript files -->
<!-- jQuery -->
<?php echo $this->Html->script('jquery.js'); ?>

<!-- jQuery UI -->
<?php echo $this->Html->script('jquery-ui.min.js'); ?>

<!-- Bootstrap JS -->
<?php echo $this->Html->script('bootstrap.min.js'); ?>

<!-- Sparkline for Mini charts -->
<?php echo $this->Html->script('sparkline.js'); ?>


<!-- jQuery flot -->
<!--[if lte IE 8]>
<?php echo $this->Html->script('excanvas.min.js'); ?>
<![endif]-->
<?php echo $this->Html->script('jquery.flot.min.js'); ?>
<?php echo $this->Html->script('jquery.flot.pie.min.js'); ?>
<?php echo $this->Html->script('jquery.flot.resize.min.js'); ?>

<!-- jQuery Knob -->
<?php echo $this->Html->script('jquery.knob.js'); ?>

<!-- jQuery Data Tables -->
<?php echo $this->Html->script('jquery.dataTables.min.js'); ?>

<!-- jQuery Knob -->
<?php echo $this->Html->script('bootstrap-switch.min.js'); ?>

<!-- jQuery Knob -->
<?php echo $this->Html->script('jquery.rateit.min.js'); ?>

<!-- jQuery prettyPhoto -->
<?php echo $this->Html->script('jquery.prettyPhoto.js'); ?>

<!-- jquery slim scroll -->
<?php echo $this->Html->script('jquery.slimscroll.min.js'); ?>

<!-- jQuery gritter -->
<?php echo $this->Html->script('jquery.gritter.min.js'); ?>

<!-- jQuery full calendar -->
<?php echo $this->Html->script('moment.min.js'); ?>

<?php echo $this->Html->script('fullcalendar.min.js'); ?>

<!-- Respond JS for IE8 -->
<?php echo $this->Html->script('respond.min.js'); ?>

<!-- HTML5 Support for IE -->
<?php echo $this->Html->script('html5shiv.js'); ?>

<!-- Custom JS -->

<?php echo $this->Html->script('custom.js'); ?>

<?php echo $this->Html->script('bootstrap-slider.js'); ?>

<!-- Javascript for this page -->
<?php echo $this->Html->script('bootstrap-colorpicker.js'); ?>

<?php echo $this->fetch('script'); ?>

</body>
</html>