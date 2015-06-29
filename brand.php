<?php
	require_once 'documents_path.inc.php';
	
	if(isset($_GET['brand_id']) && ($_GET['brand_id'] != null))
	{
		/* --pull information about item--
		 * 
		 */
?>
		<!DOCTYPE HTML>
		<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="description" content="">
				<meta name="author" content="">
				
				<title>Brand Name</title>
				<!--stylesheets-->
				<?php
					require $stylesheets_path;
				?>
			</head>
			<body>
				<!-- Navigation -->
				<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.php"><b>Easy Wheels</b></a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li>
									<a href="http://decimusfinancial.co.in/?page_id=2061">About Us</a>
								</li>
								<li>
									<a href="#">Get Finance</a>
								</li>
								<li>
									<a href="http://decimusfinancial.co.in/?page_id=1880">Contact</a>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</div>
					<!-- /.container -->
				</nav>
				<div class="container">
					<!-- Page Header -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								<?php
									require $path . '/injects/brand_brandname_view_query.php';
								?>
							</h1>
						</div>
					</div>
					<!-- Models Row -->
					<div class="row">
						<?php
							require $path . '/injects/brand_bikes_view_query.php';
						?>
					</div>
					<hr/>
				</div>
				<div class="container">
					<hr>
					<!-- Footer -->
					<footer>
						<div class="row">
							<div class="col-lg-12">
								<p>Copyright &copy; Decimus Financials Ltd. 2015</p>
							</div>
						</div>
					</footer>
				</div>
				<!-- scripts -->
				<!-- jQuery -->
				<script src="js/jquery.js" type="text/javascript"></script>
				<!-- Bootstrap Core JavaScript -->
				<script src="js/bootstrap.min.js" type="text/javascript"></script>
				<script src="scripts/index_script.js" type="text/javascript"></script>
			</body>
		</html>
<?php
	}
	else
	{
		header('Location: index.php');
	}
?>