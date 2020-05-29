<?php
	ini_set('display_startup_errors', 1);
	ini_set('display_errors', 1);
	error_reporting(-1);
	$host = '127.0.0.1';
	$dbuser = 'online_class'; 
	$dbpass = '11111111';
	$dbname = 'online_class';
	$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
	if (!$conn) {
		echo '<script>alert("DATABASE NOT CONNECTED")</script>';
	}
	$query = "UPDATE post SET views = views + 1 WHERE post_id =".$_GET["id"];
	$result = $conn->query($query);
	
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
          <a class="navbar-brand" href="index.php"><h1><b>N-VID</b></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
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
                </ul>
				</div>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h1><?php echo $_GET["title"]; ?></h1>
					</div>
					<?php
					echo '<iframe width="1120" height="630" src="https://www.youtube.com/embed/'.substr($_GET["link"],32).'"  autoplay; allowfullscreen></iframe>';
					echo "<br><br><p><h3>";
					$query = "SELECT * from post WHERE post_id =".$_GET["id"];
					$result = $conn->query($query);
					$roww = $result->fetch_assoc();
					echo $roww["likes"]."<span class=\"like\"><a href=\"like.php?id=".$_GET["id"]."\" target=\"_blank\"> Like</a></span>";
					echo $roww["views"]." views<br><br>";
					echo "<h4><span style=\"color:grey;\">".$roww["created_at"]."</span></h4><h3>";
					echo $_GET["desc"]."</h3><br><hr><br></p>";
					?>



					<div class="clearfix"> </div>
				</div>
				<h3>Comments</h3>
				<br>
				<div class="comments">
					<form action="comment.php" method="POST"  class="form-inline">
						<input type="text" name="comment" class="form-control" size="100" placeholder="Commenting as <?php if(isset($_COOKIE["user"])){ echo $_COOKIE["user"];}else{ echo "guest";} ?>">
						<input type="text" name="id" class="form-control hidden" size="60" value="<?php echo $_GET["id"];?>" hidden>
						<input type="text" name="author" class="form-control hidden" size="60" value="<?php if(isset($_COOKIE["user"])){ echo $_COOKIE["user"];}else{ echo "guest";} ?>" hidden>

						<button type="submit" class="btn btn-primary">Comment</button>
					</form>
					<div class="list-comments">
						<?php
						$query = "SELECT * from comments WHERE post_id =".$_GET["id"];
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo "<h3><span class=\"clike\"><a href=\"commentlike.php?id=".$row["comment_id"]."\" target=\"_blank\"><b style=\"color:green;font-size:1.5em;\">^</b></a></span>  &nbsp;  @<a href=\"user.php?user=".$row["author"]."\"><span style=\"color:red;\">".$row["author"]."   </span></a> ".$row["comment"]."</h3>";
								echo "<h4>".$row["likes"]." likes<br><br></h4>";
							}
						}
						else{
							echo "<h3>No comments found! Be the first to comment</h3>";
						}
						?>
					</div>
				</div>
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