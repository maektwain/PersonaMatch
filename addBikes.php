<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		
		<title>ADD BIKES</title>
		<!--stylesheets-->
		<!-- Bootstrap Core CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="css/shop-homepage.css" rel="stylesheet">
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
					<a class="navbar-brand" href="#"><b>Easy Wheels</b></a>
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
			<div class="form">
				<form id="contactform">
					<p class="contact"><label for="Brand">Brand</label></p> 
					<input id="Brand" name="Brand" placeholder="enter the brand" required="" tabindex="1" type="text">  
					<p class="contact"><label for="Model">Model</label></p> 
					<input id="Model" name="Model" placeholder="type the model name" required="" type="text"> 
					<p class="contact"><label for="Price">Price</label></p> 
					<input id="Price" name="Price" placeholder="enter price here" required="" tabindex="2" type="text">  
					<p class="contact"><label for="Rating">Rating</label></p> 
					<input type="Rating" id="Rating" name="Rating" placeholder="enter rating here" required=""> 
					<p class="contact"><label for="Specifications">Specifications</label></p> 
					<input type="text" id="Specifications" name="Specifications" placeholder="e.g. engine cc"required=""> 
					<p class="contact"><label for="Image source">Image source</label></p> 
					<input id="Image source" name="Image source" placeholder="enter URL" required="" type="url">
					<br/><br/>
					<div class="form-group">
						<label for="Comments">Enter Comments</label>
						<div class="input-group">
							<textarea name="Comments" id="Comments" class="form-control" rows="5" required></textarea>
							<span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
						</div>
					</div>
					<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
				</form>
			</div>
		</div>
		<!--scripts-->
		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	</body>
</html>