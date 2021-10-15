<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$missionType = new MissionType();
	
	if(!empty($_POST)) {
		$missionTypeData = $_POST;
		
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$missionType->editMissionType($missionTypeData);
			}
		}
		else {
			$missionType->newMissionType($missionTypeData);
		}
		createMissionJson();
		header('Location: /mission/mission-type-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$missionTypeID = $_GET['id'];
			$missionType->getMissionType($missionTypeID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
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