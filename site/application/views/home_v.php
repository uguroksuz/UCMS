<!DOCTYPE html>
<!--[if IE 9]> <html lang="zxx" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="zxx" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html dir="ltr" lang="tr">
	<!--<![endif]-->
	<head>
		<?php $this->load->view("includes/head"); ?>
	</head>
	<body class="transparent-header front-page page-loader-2">
	<!-- scrollToTop -->
    <!-- ================ -->
    <div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>

    <!-- page wrapper start -->
    <!-- ================ -->
    <div class="page-wrapper">
    <?php $this->load->view("includes/header"); ?>

    <?php $this->load->view("{$viewFolder}/content"); ?>

    
    <?php $this->load->view("includes/footer"); ?>    

    </div>
    <!-- page-wrapper end -->
	
	<?php $this->load->view("includes/include_script"); ?>
	</body>
</html>