<!DOCTYPE html>
<html>
<head>
	<title>Ajax Notes</title>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			// $.get(
			// 	$('#titleForm').attr('action'),
			// 	function(data){
			// 		$('.notes-area').html(data);
			// 	});
			$.post(
			'/notes/load',function(output){
			$('.notes-area').html(output)
			});

			$('#titleForm').on('submit', function(){
				$.post(
				$('#titleForm').attr('action'),
				$('#titleForm').serialize(),
				function(data){
					$('.notes-area').html(data);
					});
				return false;
				});

			$(document).on('focusout', 'textarea', function(){
				var form = $(this).parent();
				$.post(
					form.attr('action'),
					form.serialize(),
					function(data){
						$('.notes-area').html(data);
					});
				return false;
				});

			 $(document).on('click', '#delete', function(){
				 	event.preventDefault();
				 	var form = $(this);
				 	$.post(form.attr('href'),
				 		form.serialize(),
				 		function(data){
				 			// console.log(data_shown);
				 			$('.notes-area').html(data);
				 		}
				 	);
				 // return false;
				});
			});
	</script>
	<style>
	#container{
		width: 970px;
		height: 2000px;
	}
	.notes-area {
		border: 1px solid black;
	}
	.full-note{
		display:inline-block;
	}
	.note-box{
		height:300px;
		width:200px;
		border:1px solid black;
		margin: 10px;
		padding: 10px;
		display:inline-block;
		float:top;
	}
	.description-box{
		height:200px;
		width:175px;
		border:1px solid black;
		padding: 10px;
		display:inline-block;
	}
	.textbox{
		height:150px;
		width:150px;
	}
	#titleForm{
		margin-top: 20px;
	}
	h2{
		display:inline-block;
	}
	p {
		display:inline-block;
		margin-left:40px;
	}
	</style>
</head>
<body>
	<div id='container'>
		<h1>Notes</h1>
		<div class='notes-area'>
			</div>
		<form id='titleForm' action='/notes/title_add' method='post'>
			<input type='text' name='title' placeholder='Title...'>
			<input type='submit' value='Add Note'>
		</form>
	
</body>
</html>