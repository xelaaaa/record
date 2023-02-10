
	<?php
	require_once 'connect.php';
	if (isset($_POST['save'])) {
		$student_id = $_POST['student_id'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$course = $_POST['course'];
		$section = $_POST['section'];
		$q_checkstudent = $conn->query("SELECT * FROM `student` WHERE `student_id` = '$student_id'") or die(mysqli_error());
		$v_checkstudent = $q_checkstudent->num_rows;
		if ($v_checkstudent == 1) {
			echo '
				<script type = "text/javascript">
					alert("Username already taken");
					window.location = "student.php";
				</script>
			';
		} else {
			$conn->query("INSERT INTO `student` VALUES('', '$student_id','$firstname', '$middlename', '$lastname', '$course', '$section')") or die(mysqli_error());
			echo '
				<script type = "text/javascript">
					alert("Saved Record");
					window.location = "student.php";
				</script>
			';
		}
	}	