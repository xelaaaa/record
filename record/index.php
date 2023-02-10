<!DOCTYPE html>
<html lang = "eng">
	<head>
	
		<meta charset = "utf-8" />
		<title> LOGIN </title>
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css"/>
	</head>
	<style>
	body{
	
    background-position:center;
    background-repeat: no-repeat;
    background-size: cover;
   background-attachment: fixed;
   background-image: url("https://knowledge.wharton.upenn.edu/wp-content/uploads/2019/11/machine-programming-learning-AI-900x387.jpg");
}

p.thicker {
  font-weight: 999;
  font-size: 50px;
}
</style>
	<body style="background-color:#000033">
<center><h1><p class="thicker"  style="color:#ff9900" >Daily Attendance</p></h1></center>
	<center style="background-color:#80bfff;"><h1 style="color:#000000">Login</h1></center>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">	
			<br />
			<br />
			<div class = "col-lg-3"></div>
			<div class = "col-lg-6 well" style="background-color: #d9ffff">
			<h5 class = "nav navbar-nav navbar-right"><a style="color: blue" href = "del.php"><span class="glyphicon glyphicon-refresh">Logout</span></a></h5>

				<br />
				<div id = "result"></div>
				<br />
				<form enctype = "multipart/form-data">
					<div class = "form-group">
						<h3><label style="color:#ff9900;">Student Id:</label></h3>
						<input type = "text" id = "student" class = "form-control" required = "required"/>
						<br />
						<br />
						<div id = "error"></div>
						<br />
						<button type = "button" id = "login" class = "btn btn-primary btn-block"><span class = "glyphicon glyphicon-login"></span>Submit</button>
					</div>
				</form>
			</div>
			</div>
			
		</div>	
		</div>	
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>