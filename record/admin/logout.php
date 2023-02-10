<?php
	session_start();
	if(empty($session['id']));
	header('location:index.php');
?>
<!DOCTYPE html>
<html>
<body>
	<div style="width:150px; margin:auto height:500px; margin-top:300px">

	<?php
	include('database connection.ph');
	session_destroy();

	echo '<meta http-equive="refresh" content="2;url=login.php">';
	echo '<progress max=100><strong>Progress: 60%
	done.</strong></progress>';
	echo '<span class="itext">logging out please wait!...</span>';

	?>
	</div>
	</body>
	</html>
