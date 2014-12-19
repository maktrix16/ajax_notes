<?php 	foreach($notes as $note)
		{ 	
			?>
		<div>
			<hr>
			<div class='note-title'>
				<form class='delete-note' action='/notes/delete' method='post'>
					<h2><?=$note['title'];?></h2>
					<input type='hidden' name='id' value=<?=$note['id']?>>
					<input type='hidden' name='action' value='delete'>
					<input class='delete-link' type='submit' value='delete'>
				</form>
			</div>
			<form class='edit-note' action='/notes/edit' method='post'>
				<textarea name='description' placeholder='Enter description'><?=$note['description'];?></textarea>
				<input type='hidden' name='id' value=<?=$note['id'];?>>
				<input type='hidden' name='action' value='edit'>
			</form>
		</div>
<?php 	} 	?>	