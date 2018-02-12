<?php 
include("functions.php");

$tweetCache = read_tweet_cache();
$statuses = get_object_vars($tweetCache);

$playlists = read_playlist_cache();
?>
<!DOCTYPE html>
<html lang="en">

<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	 	<meta name="theme-color" content="#b73e39">
	 
		<title>mkbhd.tech</title>

		<!-- SEO Stuff -->
		<meta name="description" content="Marques Brownlee, known as MKBHD, is a next-gen techtuber who reviews the latest tech and expresses opinions on the tech industry as it unfolds.">
		<meta name="keywords" content="mkbhd, marques brownlee, tech youtuber, techtuber, tech enthusuast, mkbhd fan club">
		<meta name="author" content="Alex Crocker">

		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700,900" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" href="css/styles.processed.css">
</head>

<body>

		<nav class="navbar navbar-light navbar-expand-lg">
				<a class="navbar-brand" href="#">
				<img src="/img/mkbhd_black.png" width="30" height="30" alt="MKBHD logo">
			</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul class="navbar-nav">
								<li class="nav-item active">
										<a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
								</li>
								<li class="nav-item">
										<a class="nav-link disabled" href="#">Store</a>
								</li>
								<li class="nav-item">
										<a class="nav-link" href="/discord">Discord</a>
								</li>
								<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Playlists</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
											<?php foreach($playlists as $playlist) {  ?>	
											<a class="dropdown-item" href="<?php echo "https://www.youtube.com/playlist?list=" . $playlist->id; ?>"><?php echo $playlist->snippet->title; ?></a>
											<?php } ?>
										</div>
								</li>
						</ul>
				</div>
		</nav>

		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
						<div class="carousel-item active">
								<img class="d-block w-100" src="/img/slide01.jpg" alt="First slide">
						</div>
						<div class="carousel-item">
								<img class="d-block w-100" src="/img/slide02.jpg" alt="Second slide">
						</div>
						<div class="carousel-item">
								<img class="d-block w-100" src="/img/slide03.jpg" alt="Third slide">
						</div>
				</div>
				<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
				<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
		</div>
<div class="container">
	
		<div id="intro">
			<h2>Welcome to the MKBHD fan club!</h2>
			<p class="text-muted">Here&apos;s what people are saying about MKBHD...</p>
		</div>

		<div class="card-columns">
			<?php foreach($statuses['statuses'] as $status) { ?>
				<div class="card">
						<div class="card-body">
								<h5 class="card-title"><?php echo $status->user->name; ?></h5>
								<blockquote class="blockquote mb-0">
									<p class="tweet-text"><?php echo $status->text; ?></p>
								</blockquote>
								<p class="card-text"><small class="text-muted"><?php echo $status->created_at; ?></small></p>
						</div>
				</div>
			<?php } ?>
		</div>
</div><!--end .container-->
	
	<footer class="site-footer">
		<div class="container">
			<img class="footer-brand" src="/img/mkbhd_red.png" alt="mkbhd logo" />
			<div class="social-links">
				<a href="https://www.youtube.com/channel/UCBJycsmduvYEL83R_U4JriQ"><i class="fa fa-youtube fa-2x"></i></a>
				<a href="https://twitter.com/MKBHD"><i class="fa fa-twitter fa-2x"></i></a>
				<a href="http://www.facebook.com/10210956335039605"><i class="fa fa-facebook fa-2x"></i></a>
				<a href="https://open.spotify.com/user/mkbhd"><i class="fa fa-spotify fa-2x"></i></a>
				<a href="http://instagram.com/mkbhd"><i class="fa fa-instagram fa-2x"></i></a>
				<a href="https://www.reddit.com/user/Marques-Brownlee/"><i class="fa fa-reddit fa-2x"></i></a>
			</div>
		</div>
	</footer>
	
	<div class="dev-copyright">
		<span>Made with <i class="fa fa-heart"></i> by <a href="https://alexcrocker.net/">Croc</a></span>
	</div>

		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="js/index.processed.js"></script>
</body>

</html>