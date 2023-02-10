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
							<li><a href = "logout.php"></i> Logout </a></li>
						</ul>
					</li>
				</ul>
			</div>
		</nav>
		<div class = "container-fluid" style = "margin-top:70px;">
			
		
				<ul class = "nav navbar-nav navbar-right hidden-print">
				<li class = "dropdown">
						<li><a  style="color:#d9ffff" href = "admin.php"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a style="color:#d9ffff" href = "student.php"><span class = "glyphicon glyphicon-user"></span> Student</a></li>
				</li>
				<li><a  style="color:#d9ffff" href = "record.php"><span class="glyphicon glyphicon-folder-open"> Login </a></li>
                <li  class = "active"><a  href = "out.php"><span class="glyphicon glyphicon-folder-open"> Logout </a></li>

            </ul>

			</ul>
			<br />
			<div class="hidden-print"><button onClick="window.print()"><span class="glyphicon glyphicon-print"></span>Print
			</button></div>
<br>
			<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
			<div class = "modal-dialog" role = "document">	
					<div class = "modal-content ">
						<div class = "modal-body">
							
							<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
							<br />
							<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
						</div>
					</div>
				</div>
			</div>
			<div class = "well col-lg-12">
				<table id = "table" class = "table table-bordered">

					<thead class = "alert-info"> 	
					<tr style="background-color:#d9ffff;color:blue;">
							<th>Student ID</th>
							<th>Student Name</th>
							<th>Time</th>
							<th>Date</th>
							<th class="hidden-print"></th>
						</tr>
					</thead>
					<tbody>
					<?php
						$q_time = $conn->query("SELECT * FROM `out`") or die(mysqli_error());
						while($f_time = $q_time->fetch_array()){
							
					?>
						
						<tr>
							<td><?php echo $f_time['student_no']?></td>
							<td><?php echo htmlentities($f_time['student_name'])?></td>
							<td><?php echo date("h:i a", strtotime($f_time['time']))?></td>
							<td><?php echo date("m-d-Y", strtotime($f_time['date']))?></td>
							<td><button name = "<?php echo $f_time['time_id']?>" class = "btn btn-danger rtime_id hidden-print" href = "#" data-toggle = "modal" data-target = "#delete"><span class = "glyphicon glyphicon-trash"></span></button></td>
						
						</td>
					</tr>
					<?php
						}
					?>	
					</tbody>		
				</table>
	<br />
	
	<style>
  html,
  body {
    height: 50%;
  }
  .overlay {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background: rgba(0, 0, 0, 0.8);
    z-index: 2;
  }

  .confirm-box{
    position: absolute;
    width: 40%;
    height: 10%;
    top: 25%;
    left: 31%;
    text-align: center;
    color: #008ae6;
  }
 .overlay button:hover
{
    background-color: #ff0000;
}
.button {
background-color: color: #ff1a1a;
border-radius: 12px;
  }
	
.close {
    cursor: pointer;
  }
  .btn1{
   	    margin-left:15%;
   	}
	.btn2{
   	    margin-right:15%;
   	}
</style>
<ul class = "nav navbar-nav navbar-right">	
<div class="overlay" id="overlay" hidden>
    <div class="confirm-box">
      <div onclick="closeConfirmBox()" class="close">&#10006;</div>

     <h2>Are you sure you want to delete all records?</h2>
	 <a href = "dul.php"> <button class="btn2" onclick="isConfirm(true)">Yes</button></a>
      <button class="btn1" onclick="isConfirm(false)">No</button>
</div>
  </div>
  <div class="hidden-print"> <button  class="button" onclick="showConfirmBox()">Delete All</button>
  <script>
  function showConfirmBox() {
    document.getElementById("overlay").hidden = false;
  }
  function closeConfirmBox() {
    document.getElementById("overlay").hidden = true;
  }

  function isConfirm(answer) {
    if (answer) {
      alert(" Records has been deleted");
    } else {
    }
    closeConfirmBox();
  }
</script>
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
			$('.rtime_id').click(function(){
				$time_id = $(this).attr('name');
				$('.remove_id').click(function(){
					window.location = 'out_time.php?time_id=' + $time_id;
				});
			});
		});
	</script>
</html>