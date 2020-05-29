<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	if(isset($_GET["u"])){
		$_COOKIE["user"]=$_GET["u"];
    	setcookie("user", $_GET["u"], time() + (86400 * 30), "/");
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<title>N-Vid</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php"><h1><b>N-Vid</b></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right" action="search.php" method="GET">
					<input type="text" name="query" class="form-control" value="<?php echo $_GET["query"]; ?>">
					<input type="submit" value=" ">
				</form>
			</div>
			<div class="header-top-right">
				<div class="file">
					<a href="upload.php">Upload</a>
				</div>	
				<div class="signin">
					<a href="signup.html" class="play-icon popup-with-zoom-anim">Sign Up</a>
				</div>
				<div class="signin">
					<a href="signin.html" class="play-icon popup-with-zoom-anim">Sign In</a>
				</div>
				</div>
				<div class="clearfix"> </div>
			</div>
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
                  <li class="active"><a href="index.php" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="search.php?query=MPCA" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>MPCA</a></li>
					<li><a href="search.php?query=DBMS" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>DBMS</a></li>
					<li><a href="search.php?query=TOC" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>TOC</a></li>
					<li><a href="search.php?query=LA" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>LA</a></li>
					<li><a href="search.php?query=DAA" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>DAA</a></li>

				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Recent Videos</h3>
					</div>
					<?php
						$host = '127.0.0.1';
						$dbuser = 'online_class'; 
						$dbpass = '11111111';
						$dbname = 'online_class';
						$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
						if (!$conn) {
							echo '<script>alert("DATABASE NOT CONNECTED")</script>';
						}
						$query = "SELECT * FROM post WHERE title LIKE '%".$_GET["query"]."%' or sub LIKE '%".$_GET["query"]."%' or author LIKE '%".$_GET["query"]."%' or description LIKE '%".$_GET["query"]."%' ORDER BY views DESC LIMIT 10";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							  echo "<div class=\"col-md-4 resent-grid recommended-grid slider-top-grids\">
							  <div class=\"resent-grid-img recommended-grid-img\">
								  <a href=\"single.php?title=".$row["title"]."&desc=".$row["description"]."&link=".$row["link"]."&id=".$row["post_id"]."&views=".$row["views"]."\"><img src=\"images/".$row["sub"].".jpg\" alt=\"\" /></a>
								  <div class=\"time\">
									<p>".$row["likes"]." likes</p>
								  </div>
								  <div class=\"clck\">
									  <span class=\"glyphicon glyphicon-hand-like\" aria-hidden=\"true\"></span>
								  </div>
							  </div>
							  <div class=\"resent-grid-info recommended-grid-info\">
								  <h3><a href=\"single.php?title=".$row["title"]."&desc=".$row["description"]."&link=".$row["link"]."&id=".$row["post_id"]."&views=".$row["views"]."\" class=\"title title-info\">".$row["title"]."</a></h3>
								  <ul>
									  <li><p class=\"author author-info\"><a href=\"#\" class=\"author\">".$row["author"]."</a></p></li>
									  <li class=\"right-list\"><p class=\"views views-info\">".$row["views"]." views</p></li>
								  </ul>
							  </div>
						  </div>";
						  }
					  }
					  
					?>
					<br>
                	<br>
						<div class="clearfix"> </div>
				</div><br><br>
			</div>
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><a href="about.html">About</a></li>
								<li><a href="press.html">Press</a></li>
								<li><a href="copyright.html">Copyright</a></li>
								<li><a href="creators.html">Creators</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="developers.html">Developers</a></li>
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
								<li><a href="terms.html">Terms</a></li>
								<li><a href="privacy.html">Privacy</a></li>
								<li><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Send feedback</a></li>
								<li><a href="privacy.html">Policy & Safety </a></li>
								<li><a href="try.html">Try something new!</a></li>
							</ul>
						</div>
					</div>
					
				</div>
			</div>
			<!-- //footer -->
			
		</div>
		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>