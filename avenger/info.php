<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$info = new Info();
	
	if(!empty($_POST)) {
		$infoData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$info->editInfo($infoData);
			}
		}
		else {
			$info->newInfo($infoData);
		}
		header('Location: /avenger/info-list.php');
	}
	else {
		if(isset($_GET['id'])) {
			if(is_numeric($_GET['id'])) {
				$infoID = $_GET['id'];
				$info->getInfo($infoID);
			}
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="info.php" method="post" id="info-form">
					<?php infoForm($info); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>