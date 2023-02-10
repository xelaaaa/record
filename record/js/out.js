$(document).ready(function(){
	$error = $('<center><h2 class = "text-danger">Invalid id<h2></center>');
	$error1 = $('<center><h2 class = "text-danger">Please fill up the field<h2></center>');
	$('#logout').click(function(){
		$error.remove();
		$error1.remove();
		$student = $('#student').val();
		if($student == ""){
			$error1.appendTo('#error');
		}else{	
			$.post('check.php', {student: $student},
				function(show){
					if(show == 'Success'){
						$.ajax({
							type: 'POST',
							url: 'lt.php',
							data: {
								student: $student
							},
							success: function(result){
								$result = $('<h2 class = "text-warning">You have been logout:</h2>' + result).appendTo('#result');
								$('#student').val('');
								setTimeout(function(){
									$result.remove();
								}, 10000);
							}
						});
					}else{
						$('#student').val('');
						$error.appendTo('#error');
					}
				}
			)
		}	
	});
});