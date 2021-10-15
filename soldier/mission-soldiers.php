<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$missionSoldier = new SoldierMission();
	$missionSoldierFields = [];
	
	if(!empty($_POST)) {
		$missionSoldierData = $_POST;
			
		$shotsArray = explode("/",$missionSoldierData['shots'][$i]);
		$overwatchArray = explode("/",$missionSoldierData['overwatch'][$i]);
		$meleeArray = explode("/",$missionSoldierData['melee'][$i]);
			
		$MSArray['mission_id'] = $missionID;
		$MSArray['soldier_id'] = $missionSoldierData['soldier_id'][$i];
		$MSArray['rank_id'] = $missionSoldierData['rank_id'][$i];
		$MSArray['class_id'] = $missionSoldierData['class_id'][$i];
		$MSArray['shots_hit'] = $shotsArray[0];
		$MSArray['shots_taken'] = $shotsArray[1];
		$MSArray['overwatch_hit'] = $overwatchArray[0];
		$MSArray['overwatch_taken'] = $overwatchArray[1];
		$MSArray['melee_hit'] = $meleeArray[0];
		$MSArray['melee_taken'] = $meleeArray[1];
		$MSArray['damage'] = $missionSoldierData['damage'][$i];
		$MSArray['killed_aliens'] = $missionSoldierData['killed_aliens'][$i];
		$MSArray['killed_lost'] = $missionSoldierData['killed_lost'][$i];
		$MSArray['mvp'] = $missionSoldierData['mvp'][$i];
		$MSArray['status'] = $missionSoldierData['status'][$i];
		$MSArray['status_time'] = $missionSoldierData['status_time'][$i];
		$MSArray['extra'] = $missionSoldierData['extra'][$i];
		$MSArray['extra_info'] = $missionSoldierData['extra_info'][$i];
		$MSArray['promoted'] = $missionSoldierData['promoted'][$i];
		if(isset($missionData['MSid'])) {
			$MSArray['id'] = $missionSoldierData['MSid'][$i];
		}
			
		if(isset($missionData['MSid'][$i]) and is_numeric($missionData['MSid'][$i])) {
			$missionSoldier->editSoldierMission($MSArray);
		}
		else {
			$missionSoldier->newSoldierMission($MSArray);
		}	

	header('Location: /soldier/mission-soldiers-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$missionSoldierID = $_GET['id'];
			$missionSoldier->getSoldierMission($missionSoldierID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="mission-soldiers.php" method="post" id="mission-form" enctype="multipart/form-data">
					<?php missionSoldierForm($missionSoldier); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>