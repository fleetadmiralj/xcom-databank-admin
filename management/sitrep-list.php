<?php include_once '/home/joshch9/project/adminInclude.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main">
				<h2>List of All SITREPs</h2>
				<p><a href="/management/sitrep.php">Add new SITREP</a></p>
				<?php listSitrep(); ?>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>