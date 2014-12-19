
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>*****CHANGE TITLE HERE!!!!!*****</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style type="text/css">
		.container{font-family: arial; width: 250px; margin:20px auto;}
		h1{font-size: 14px;}
		h2{font-size: 18px; display:inline-block;margin: 0px;}
		.delete-note, .edit-note, .add-note{vertical-align: top;}
		.note-title{margin-top:15px;}
		.delete-link{
			border: none; 
			background: none;
			display: inline-block;
			font-weight:bold; font-size: 16px; 
			color: blue;
			float:right;
		}
		textarea{
			width:180px; height: 180px;
			font-size: 14px;
			margin-top:20px; margin-bottom: 5px;
			overflow-y: visible;
		}
		.textbox{width:180px; font-size: 14px; margin: 5px 0px;}
		.blue-btn{
			display: block; width:100px; height: 30px; font-size: 14px;
			background-color: blue; color:white;
		}

	</style>
	<script type="text/javascript">

		$(document).ready(function(){

			$.post(
				'notes/load', 
				function(output){
					$('#display').html(output);
				}
			);

			$('#add-note').on('submit',function(){ 
				var form=$(this);
				$.post(
					form.attr('action'),
					form.serialize(),
					function(output){
						$('#display').html(output);
					}
				);
				return false;
			});

			$('#display').on('submit','.delete-note',function(){ 
				var form=$(this);
				$.post(
					form.attr('action'),
					form.serialize(),
					function(output){
						$('#display').html(output);
					}
				);
				return false;
			});

				$('#display').on('focusout','.edit-note',function(){  //CHANGE HERE
//					alert('editng via JSON');
					var form=$(this);
					$.post(
						form.attr('action'),
						form.serialize(),
						function(output){
							$('#display').html(output);
						}
					);
					return false;
				});

//			}); //end of document .on
		});


	</script>
</head>
<body>
	<div class='container'>
		<h1>Notes</h1>

		<!-- JSON output here -->
		<div id='display'></div>	

		<div>
			<hr>
			<form id='add-note' action='/notes/add' method='post'>
				<input name='title' class='textbox' type='textbox' placeholder='Insert note title here...'>
				<input type='hidden' name='action' value='add'>
				<input class='blue-btn' type='submit' value='Add Note'>
			</form>
		</div>

	

	</div> <!-- end of container Div -->

</body>
</html>