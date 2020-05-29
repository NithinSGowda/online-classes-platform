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
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div>  

        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
		<!-- upload -->
		<div class="upload">
			<!-- container -->
			<div class="container container-white">
				<h2>Publish new content</h2>
				<form action="publish.php" method="POST">
					<div class="form-group">
					  <label for="exampleInputEmail1">Author : </label>
					  <input type="text" class="form-control" name="author" value="<?php if(isset($_COOKIE["user"])){ echo $_COOKIE["user"];}else{ echo "guest";} ?>" readonly>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Link to content : </label>
						<input type="text" class="form-control" name="link" placeholder="Enter link" required>
						<small id="emailHelp" class="form-text text-muted">Upload on https://tempcloud.ml to get link of any file</small>
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Title : </label>
						<input type="text" class="form-control" name="title" placeholder="Enter title" required>
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Subject : </label>
						<select name="sub">
							<option value="DBMS">DBMS</option>
							<option value="MPCA">MPCA</option>
							<option value="DAA">DAA</option>
							<option value="TOC">TOC</option>
							<option value="LA">LA</option>
						</select>
					  </div>
					  <div class="form-group">
						<label for="exampleInputEmail1">Description : </label>
						<input type="text" class="form-control" name="desc" placeholder="Enter description" style="height: 6em;">
					  </div>
					<button type="submit" class="btn btn-primary">Publish</button><br><br>
				  </form>
			</div>
			<!-- //container -->
		</div>
		<!-- //upload -->
			<!-- footer -->
			<div class="footer">
				<div class="container">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><a href="#">About</a></li>
								<li><a href="#">Press</a></li>
								<li><a href="#">Copyright</a></li>
								<li><a href="#">Creators</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="#">Developers</a></li>
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#" class="play-icon popup-with-zoom-anim">Send feedback</a></li>
								<li><a href="#">Policy & Safety </a></li>
								<li><a href="#">Try something new!</a></li>
								<li><p>Copyright © 2020 PES. All Rights Reserved | Design by <a href="http://bitly.com/tempcloudinsta">Nithin S</a></p></li>
							</ul>
						</div>
					</div>
					<div class="footer-bottom">
						
					</div>
				</div>
			</div>
			<!-- //footer -->
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