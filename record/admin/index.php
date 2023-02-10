<!DOCTYPE html>
<?php
	session_start();
	if(ISSET($_SESSION['admin_id'])){
		header('location: home.php');
	}
?>
<html lang = "eng">
	<head>
	<style> 

body{
	
    background-position:center;
    background-repeat: no-repeat;
    background-size: cover;
   background-attachment: fixed;
   background-image: url("https://img.freepik.com/free-vector/laptop-with-program-code-isometric-icon-software-development-programming-applications-dark-neon_39422-971.jpg");
}
</style>
		<title>Admin</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
		<body style="background-color:#000033">
		<center style="background-color: #000000;"><h1 style="color:#d9ffff"></h1></center>
		<body>
				</div>
			</div>
		</nav>
	
			<div class = "row row-centered">
				<div class = "col-lg-2 col-centered"></div>
				<div class = "col-lg-2 col-centered"></div>
				<div class = "col-lg-4 col-centered">
				
						<div class = "panel-heading">
						<th><img src = "images/at.png" width = "100%" height = "100%"/></th>
						</div>
						<div class = "panel-body">
							<form enctype = "multipart/form-data">
								<div id = "username_warning" class = "form-group">
								<label class = "control-label" style="color:#d9ffff">Username:</label>
									<input type = "text" id = "username" class = "form-control" />
								</div>
								<div id = "password_warning" class = "form-group">
								<label class = "control-label" style="color:#d9ffff">Password:</label>
									<input type = "password" maxlength = "12" id = "password" class = "form-control" />
								</div>
								<div id = "result"></div>
								<br />
								<button type = "button" class = "btn btn-primary btn-block" id = "login_admin">Login</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
</html>