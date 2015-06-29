<?php
	require_once 'documents_path.inc.php';
	
	if(isset($_GET['item_id']) && ($_GET['item_id'] != null))
	{
		/* --pull information about item--
		 * 
		 */
?>
		<!DOCTYPE HTML>
		<html dir="ltr" xmlns="http://www.w3.org/1999/xhtml" lang="en-gb">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="viewport" content="width=device-width, user-scalable=no">
				<meta name="description" content="">
				<meta name="author" content="">

				<title>Shop Homepage - Start Bootstrap Template</title>

				<!-- Bootstrap Core CSS -->
				<link href="stylesheets/bootstrap.min.css" rel="stylesheet" />
				<!-- Custom CSS -->
				<link href="stylesheets/shop-homepage.css" rel="stylesheet" />
				<!-- Wow Slider -->
				<link rel="stylesheet" href="http://wowslider.com/styles/mainstyle.css" type="text/css" media="screen" />
				<link rel="stylesheet" type="text/css" href="http://wowslider.com/sliders/demo-77/engine1/style.css" />
				<!-- custom stylesheet -->
				<link rel="stylesheet" href="stylesheets/item_style.css" type="text/css" />
				
				<noscript>
					<div style="display:inline;">
						<img height="1" width="1" style="border-style:none;" alt="" src="http://www.googleadservices.com/pagead/conversion/1071863997/?label=YwhdCOff5AIQvbGN_wM&amp;guid=ON&amp;script=0"/>
					</div>
				</noscript>
			</head>
			<body>
				<!-- Navigation -->
				<nav class="navbar navbar-xs navbar-inverse navbar-fixed-top" role="navigation">
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
					<?php
						require $path. '/injects/item_bike_view_query.php';
					?>
				</div>
				<nav class="navbar navbar-xss navbar-inverse" role="navigation">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Check Out Similar Models</a>
						</div>
					</div>
				</nav>
				
				<!-- code for image slider starts-->
				<div class="container">
					<div>
						<div id="wowslider-container1">
							<div class="ws_images">
								<ul>
									<li>
										<img src="http://racem.org/wp-content/uploads/parser/Yamaha-350-1.jpg"   id="wows1_0"/>
									</li>
									<li>
										<img src="http://www.safexbikes.com/images/PETROL%20TANK/bajaj-pulsar-200-cc.jpg"  id="wows1_1"/>
									</li>
									<li>
										<img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcS2CesEgCDwD2Y47Rj-dqQJtfTb09AaKP7PJyj4tbSQJwqyotY"  id="wows1_2"/>
									</li>
									<li>
										<img src="http://www.drivespark.com/img/2013/09/17-1379415347-honda-activa-03.jpg"  id="wows1_3"/>
									</li>
								</ul>
							</div>
						</div>
						<div id="flags" align="right" style="height: 35px;"></div>
					</div>
				</div>
				
				<!-- comment section -->
				<div class="well">
					<form class="form-horizontal" role="form">
						<h4>Comments</h4>
						<div id="comments_start_id" class="form-group" style="padding:14px;">
							<?php
								require $path . '/injects/item_comments.php';
							?>
						</div>
						<h4>Write Comments</h4>
						<div class="form-group" style="padding:14px;">
							<textarea id="comment_input_id" class="form-control bg-primary" placeholder="some comments will be shown here."></textarea>
							<br/><br/>
							<button class="btn btn-success pull-right" id="post_button_id" type="button">Post</button>
						</div>
					</form>
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
				<script src="scripts/bootstrap.min.js" type="text/javascript"></script>
				<script src="scripts/item_script.js" type="text/javascript"></script>
				<!-- Wow Slider -->
				<script type="text/javascript" src="http://wowslider.com/images/demo/jquery.js"></script>
				<script type="text/javascript" src="http://wowslider.com/styles/a.js"></script>
				<script type="text/javascript" src="http://www.googleadservices.com/pagead/conversion.js"></script>
				<script type="text/javascript" src="http://wowslider.com/images/demo/wowslider.js"></script>
				<script type="text/javascript" src="http://wowslider.com/sliders/demo-77/engine1/script.js"></script>
			</body>
		</html>
<?php
	}
	else
	{
		header('Location: index.php');
	}
?>