<?php
	foreach($notes as $note)
	{?>
	<div class='note-box'>
		<h2><?=$note['title']?></h2>
		<a id ='delete' href="/notes/delete/<?= $note['id']?>">delete</a>
		<div class='description-box'>
			<form class='notesForm' action='/notes/description_add' method='post'>
				<textarea class='textbox' name='description' placeholder='What is your note?...'><?= $note['description']?></textarea>
				<input type='hidden' name='id_holder' value=<?= $note['id']?>>
			</form>
		</div>
	</div>
<?php }?>