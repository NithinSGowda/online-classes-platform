<?php
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
					<input type="text" class="form-control" placeholder="Search..." name="query">
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
				<div class="top-grids"> <!--Q&A-->
					<div class="recommended-info">
						<h3>Ask a question</h3>
					</div>
					<form action="ask.php" method="POST"  class="form-inline"><div class="form-group">
						<input type="text" name="question" class="form-control" size="100" placeholder="Asking as <?php if(isset($_COOKIE["user"])){ echo $_COOKIE["user"];}else{ echo "guest";} ?>">
						</div><div class="form-group">
						<label for="exampleInputEmail1">&nbsp;&nbsp; Subject : &nbsp;</label>
						<select name="sub">
							<option value="1">DBMS</option>
							<option value="2">MPCA</option>
							<option value="3">DAA</option>
							<option value="4">TOC</option>
							<option value="5">LA</option>
						</select>
					  </div>
						<input type="text" name="author" class="form-control hidden" size="60" value="<?php if(isset($_COOKIE["user"])){ echo $_COOKIE["user"];}else{ echo "guest";} ?>" hidden>
						&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Ask</button>
					</form>
					<br><br><br>
					<div class="recommended-info">
						<h3>Top questions</h3>
					</div>
					<?php
						$host = '127.0.0.1';
						$dbuser = 'secret'; 
						$dbpass = 'secret';
						$dbname = 'online_class';
						$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
						if (!$conn) {
							echo '<script>alert("DATABASE NOT CONNECTED")</script>';
						}
						$query = "SELECT * from questions ORDER BY likes DESC LIMIT 3";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {                      
						  while($row = $result->fetch_assoc()) {
							  echo "<h4><hr><span class=\"clike\" style=\"font-size:13px;\"><a href=\"queslike.php?id=".$row["question_id"]."\" target=\"_blank\">like</a></span> &nbsp;".$row["question"]." ".$row["likes"]." likes - <a href=\"user.php?user=".$row["author"]."\">".$row["author"]."</a></h4>";
							  $query = "SELECT * from answers WHERE question_id = '".$row["question_id"]."' ORDER BY likes DESC LIMIT 1";
							  $res = $conn->query($query);
							  $res = $res->fetch_assoc();
							  if(isset($_COOKIE["user"])){
								   $auth = $_COOKIE["user"];
								}else{
									$auth = "guest";
								}
							  echo "<form action=\"answer.php\" method=\"POST\"  class=\"form-inline\"><div class=\"form-group\">
							  <input type=\"text\" name=\"answer\" class=\"form-control\" size=\"100\" placeholder=\"Answering as ".$auth."\">
							  </div>
							  <input type=\"text\" name=\"author\" class=\"form-control hidden\" size=\"60\" value=\"".$auth."\" hidden>
							  <input type=\"text\" name=\"question_id\" class=\"form-control hidden\" size=\"60\" value=\"".$row["question_id"]."\" hidden>
							  &nbsp;&nbsp;<button type=\"submit\" class=\"btn btn-primary\">Answer</button>
						  </form>";
						  echo "<h5>&nbsp;&nbsp;&nbsp;<span class=\"clike\" style=\"font-size:10px;\"><a href=\"anslike.php?id=".$res["answer_id"]."\" target=\"_blank\">like</a></span> &nbsp;".$res["answer"]." ".$res["likes"]." likes - <a href=\"user.php?user=".$res["author"]."\">".$res["author"]."</a></h5>";
						  }
					  }
					  
					?>
				</div>

				<hr>
				<br>
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Recent Videos</h3>
					</div>
					<?php
						$query = "SELECT * from post ORDER BY created_at DESC LIMIT 3";
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
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Highest viewed</h3>
					</div>
					<?php
						$query = "SELECT * from post ORDER BY views DESC LIMIT 3";
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
				</div>
				<br><br>
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Highest liked</h3>
					</div>
					<?php
						$query = "SELECT * from post ORDER BY likes DESC LIMIT 3";
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
					  $conn->close();
					?>
					<br>
                	<br>
						<div class="clearfix"> </div>
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