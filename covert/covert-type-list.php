<?php include_once '/home/joshch9/project/adminInclude.php' ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main">
				<h2>List of All Covert Action Types</h2>
				<p><a href="/covert/covert-type.php">Add new Covert Action Type</a></p>
				<?php listCovertType(); ?>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>