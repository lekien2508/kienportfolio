<!DOCTYPE HTML>
<html>
	<head>
		<title>Admin Panel</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<?php echo csrf_meta() ?>
		<?php echo $this->include('/admin/modules/css') ?>
	</head>
	<body class="is-preload">
	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Main -->
		<div id="main">
			<div class="inner">
				<!-- Header -->
				<?php echo $this->include('/admin/modules/header') ?>
				<!-- End Header -->
				<?php echo $this->renderSection('content'); ?>
			</div>
		</div>
		<!-- End Main -->
		<!-- Sidebar -->
		<?php echo $this->include('/admin/modules/sidebar') ?>
		<!-- End Sidebar -->
	</div>
	<!-- Scripts -->
	<?php echo $this->include('/admin/modules/scripts') ?>
	<!-- End Scripts -->
	</body>
</html>