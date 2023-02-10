<!DOCTYPE html>
<?php
	require_once 'validator.php';
	require_once 'account.php'; 
?>
<html lang = "eng">
	<head>
		<title>Admin</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "css/bootstrap.css" />
		<link rel = "stylesheet" href = "css/jquery.dataTables.css" />
	</head>
	<body style="background-color:#000033">
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
				</div>
				<ul class = "nav navbar-nav navbar-right">
				<li><a href = "home.php"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
					<li class = "dropdown">
						<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i ></i> <?php echo htmlentities($admin_name)?></b></a>
						<ul class = "dropdown-menu">
							<li><a href = "logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
			<ul class = "nav nav-pills">
				
				<ul class = "nav navbar-nav navbar-right hidden-print">
				<li class = "dropdown active">
						<li><a style="color:#d9ffff" href = "student.php"><span class = "glyphicon glyphicon-user"></span> Student</a></li>
				</li>
				<li><a  style="color:#d9ffff" href = "record.php"><span class="glyphicon glyphicon-folder-open"> Login </a></li>
				<li><a  style="color:#d9ffff" href = "out.php"><span class="glyphicon glyphicon-folder-open"> logout </a></li>			</ul>

			</ul>
			<br />
			
			<h1 style="color:#d9ffff">Admin</h1>
</br>
			<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-primary">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Add Admin</h4>
						</div>
						<form method = "POST" action = "save_admin_query.php" enctype = "multipart/form-data">
							<div class  = "modal-body">
								<div class = "form-group">
									<label>Username:</label>
									<input type = "text" required = "required"  name = "username" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Password:</label>
									<input type = "password" maxlength = "12"  name = "password" required
      pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*?[0-9])(?=.*?[!@#$%^&*+`~'=?\|\]\[\(\)\-<>/]).{8,}" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Firstname:</label>
									<input type = "text" name = "firstname" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Middlename:</label>
									<input type = "text" name = "middlename" placeholder = "(Optional)" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Lastname:</label>
									<input type = "text" name = "lastname" required = "required" class = "form-control" />
								</div>
							</div>
							<div class = "modal-footer">
								<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content ">
						<div class = "modal-body">
							<center><label class = "text-danger">Are you sure you want to delete this admin?</label></center>
							<br />
							<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "modal fade" id = "edit_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
				<div class = "modal-dialog" role = "document">
					<div class = "modal-content panel-warning">
						<div class = "modal-header panel-heading">
							<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
							<h4 class = "modal-title" id = "myModallabel">Edit Admin</h4>
						</div>
						<div id = "edit_query"></div>
					</div>
				</div>
			</div>
			
			<div class = "well col-lg-12">
			<ul class = "nav navbar-nav navbar-right">
				<button type = "button" class = "btn btn-success hidden-print" data-target = "#myModal" data-toggle = "modal"><span class = "glyphicon glyphicon-plus"></span>Add</button>
</ul>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>	
						<tr class = "alert-info">
						<tr style="background-color:#d9ffff;color:blue;">
							<th>Username</th>
							<th class="hidden-print">Password</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Lastname</th>
							<th class="hidden-print"></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$q_admin = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
						while($f_admin = $q_admin->fetch_array()){
					?>	
						<tr>
							<td><?php echo $f_admin['username']?></td>
							<td class="hidden-print"><?php echo md5($f_admin['password'])?></td>
							<td><?php echo $f_admin['firstname']?></td>
							<td><?php echo $f_admin['middlename']?></td>
							<td><?php echo htmlentities($f_admin['lastname'])?></td>
							<td><a class = "btn btn-danger radmin_id hidden-print" name = "<?php echo $f_admin['admin_id']?>" href = "#" data-toggle = "modal" data-target = "#delete"><span class = "glyphicon glyphicon-trash hidden-print"></span></a> <a class = "btn btn-warning  eadmin_id hidden-print" name = "<?php echo $f_admin['admin_id']?>" href = "#" data-toggle = "modal" data-target = "#edit_admin"><span class = "glyphicon glyphicon-edit hidden-print"></span></a></td>
						</tr>
					<?php
						}
					?>
					</tbody>
				</table>
			<br />
			<br />	
			<br />		
			</div>
		</div>
		
		</div>	
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/jquery.dataTables.js"></script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('.radmin_id').click(function(){
				$admin_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'delete_admin.php?admin_id=' + $admin_id;
				});
			});
			$('.eadmin_id').click(function(){
				$admin_id = $(this).attr('name');
				$('#edit_query').load('load_edit.php?admin_id=' + $admin_id);
			});
		});
	</script>
</html>