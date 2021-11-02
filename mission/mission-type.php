<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$errorMsg = "";
	$missionType = new MissionType();
	if(!empty($_POST)) {
		$errorMsg = $missionType->processForm($_POST, '/mission/mission-type-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$missionTypeID = $_GET['id'];
			$missionType->getMissionType($missionTypeID);
		}
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
			<?php
				if($errorMsg != "") {
			?>
				<p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
			<?php
				}
			?>
				<form action="mission-type.php" method="post" id="mission-type-form">
					<?php missionTypeForm($missionType); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>