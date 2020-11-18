<?php
require_once('lib/print.php');
?>
<?php
require_once('view/top.php');
?>

		<form action="create_process.php" method='post'>
			<p>
				<input type="text" name='title' placeholder='title'>
			</p>
			<p>
				<textarea name="description" placeholder="description" id="" cols="30" rows="10"></textarea>
			</p>
			<p>
				<input type="submit">
			</p>
		</form>
		<?php
	require_once('view/bottom.php');
	?>
