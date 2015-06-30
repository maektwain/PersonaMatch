<?php
	require_once 'documents_path.inc.php';
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>Home</title>
		
		<!--stylesheets-->
		<?php
			require $stylesheets_path;
		?>

		<?php
			require $db_path;
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
		<!-- Page Content -->
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<p class="lead">SELECT PREFERENCE</p>
					<div class="list-group">
						<a href="#" class="list-group-item">Price Range</a>
						<a href="#" class="list-group-item">Personality Match</a>
						<a href="#" class="list-group-item">Fuel Efficiency</a>
						<a href="#" class="list-group-item">Data Science</a>
						<a href="http://decimusfinancial.co.in/" class="list-group-item">Decimus Financial LTD.</a>
					</div>
				</div>
				<div class="col-md-9">
					<div class="row carousel-holder">
						<div class="col-md-12">
							<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
									<li data-target="#carousel-example-generic" data-slide-to="1"></li>
									<li data-target="#carousel-example-generic" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="item">
										<img class="slide-image" src="http://www.1066motorcycletraining.co.uk/sites/default/files/slideshow/home-banner3.jpg" alt="" width="800" height="300">
									</div>
									<div class="item active">
										<img class="slide-image" src="http://www.chrismullins.co.uk/jsscript/src/Bike2.jpg" alt="" width="800" height="300">
									</div>
									<div class="item">
										<img class="slide-image" src="http://31.222.134.33/imagestream/50240/485761x1024x0_000000_H.jpg" alt="" width="800" height="300">
									</div>
									<div class="item">
										<img class="slide-image" src="http://31.222.134.33/imagestream/50240/484493x1024x0_000000_H.jpg" alt="" width="800" height="300">
									</div>   
								</div>
								<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-left"></span>
								</a>
								<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
									<span class="glyphicon glyphicon-chevron-right"></span>
								</a>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- show all the brand tabs here -->
						<?php
							require $path . '/injects/index_brand_view_query.php';
						?>
					</div>
				</div>
			</div>
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
		<?php
			require $path . '/injects/index_popup_view.php';
		?>
		<!-- scripts -->
		<!-- jQuery -->
		<script src="scripts/jquery.js" type="text/javascript"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
		<script src="scripts/index_script.js" type="text/javascript"></script>
	</body>
</html>