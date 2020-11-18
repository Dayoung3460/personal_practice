<?php
require_once('lib/print.php');
// in php file, you cannot use the same method more than a time so as you put _once behind require,
//method is used once.

?>
<?php
require_once('view/top.php');
?>
		<a href="create.php">create</a>
		<?php
			if(isset($_GET['id'])){ ?>
				<a href="update.php?id=<?= $_GET['id']; ?>">update</a>
				<form action='delete_process.php' method='post'>
					<input type="hidden" name='id' value='<?= $_GET['id']; ?>'>
					<input type="submit" value='delete'>
				</form>
		<?php } ?>
		
		
		
		<h2>
			<?php
			print_title();
			?>
		</h2>

		

		<?php
			description();
		?>

	<?php
	require_once('view/bottom.php');
	?>
