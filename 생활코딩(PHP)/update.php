<?php
require_once('lib/print.php');
?>
<?php
require_once('view/top.php');
?>
		<h2>
			<?php
			print_title();
			?>
		</h2>

		<form action="update_process.php" method='post'>	
			<input type="hidden" name='old_title' value='<?=$_GET['id']?>'>
			<p>
				<input type="text" name='title' placeholder='title' value="<?php print_title(); ?>">
			</p>
			<p>
				<textarea name="description" placeholder="description" id="" cols="30" rows="10"><?php description(); ?></textarea>
			</p>
			<p>
				<input type="submit">
			</p>
		</form>

		<?php
	require_once('view/bottom.php');
	?>
