<?php
	session_start();
	include ('connect.php');
	$connection = mysqli_connect('localhost', 'root', '', 'db_sars');

    ?>


<form method = "POST" action = "save_student_query.php?student_id=<?php echo $f_add_student['student_id']?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
	<div class = "form-group">
			<label>Image</label>
			<input type = "file" name = "image" id="image"  required = "required" class = "form-control" />
		</div>
</form>