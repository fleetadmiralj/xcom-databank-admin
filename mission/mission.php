<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$mission = new Mission();
	$missionFields = [];
	
	if(!empty($_POST)) {
		$missionData = $_POST;

		$missionFields['objective_id'] = $missionData['objective_id'];
		if(isset($missionData['dark_event_id'])) {
			$missionFields['dark_event_id'] = $missionData['dark_event_id'];
		}
		
		if(isset($missionData['chosen_id'])) {
			$missionFields['chosen_id'] = $missionData['chosen_id'];
		}
		
		if(isset($missionData['episode'])) {
			$missionFields['episode'] = $missionData['episode'];
		}
		
		if(isset($missionData['url'])) {
			$missionFields['url'] = $missionData['url'];
		}
		
		if(isset($missionData['location'])) {
			$missionFields['location'] = $missionData['location'];
		}
		
		$missionFields['sector'] = $missionData['sector'];
		
		if(isset($missionData['mission_date'])) {
			$missionFields['mission_date'] = $missionData['mission_date'];
		}
		
		$missionFields['operation_name'] = $missionData['operation_name'];
		$missionFields['reward'] = $missionData['reward'];
		$missionFields['difficulty'] = $missionData['difficulty'];
		
		if(isset($missionData['chosen_result'])) {
			$missionFields['chosen_result'] = $missionData['chosen_result'];
		}
		
		if(isset($missionData['rating'])) {
			$missionFields['rating'] = $missionData['rating'];
		}
		
		$missionFields['complete'] = $missionData['complete'];
		
		if(isset($missionData['turns'])) {
			$missionFields['turns'] = $missionData['turns'];
		}
		
		$missionFields['is_chain'] = $missionData['is_chain'];
		if(isset($missionData['is_infiltration'])) {
			$missionFields['is_infiltration'] = $missionData['is_infiltration'];
		}
		if(isset($missionData['infiltration'])) {
			$missionFields['infiltration'] = $missionData['infiltration'];
		}
		
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				if(isset($_POST['deleted'])) {
					if(!empty($_FILES)) {
						$missionFields['picture'] = $_FILES["picture"];
					}
					else {
						$missionFields['picture'] = null;
					}
				}
				else {
					if(!empty($missionData['currentphoto'])) {
						$missionFields['picture'] = $soldierData['currentphoto'];
					}
					elseif(!empty($_FILES)) {
						$missionFields['picture'] = $_FILES["picture"];
					}
					else {
						$missionFields['picture'] = null;
					}
				}
				
				$missionFields['id'] = $missionData['id'];
				$mission->editMission($missionFields);
			}
		}
		else {
			if(!empty($_FILES)) {
				$missionFields['picture'] = $_FILES["picture"];
			}
			$mission->newMission($missionFields);
		}
		
		// Get the mission ID
		$missionID = $mission->id;
		
		// If Infiltration is set and less than 100, then don't set the sitrep or aliens
		if(!isset($missionData['infiltration']) ? true : ( ($missionData['infiltration'] < 100) ? false : true )) {
			// Set MissionSitrep
			if(isset($missionData['sitrep'])) {
				$sitrepCount = sizeof($missionData['sitrep']);
				
				for( $i = 0; $i < $sitrepCount; $i++ ) {
					$missionSitrep = new MissionSitrep;
					
					$MSRArray['mission_id'] = $missionID;
					$MSRArray['sitrep_id'] = $missionData['sitrep'][$i];
					if(isset($missionData['MSRid'])) {
						$MSRArray['id'] = $missionData['MSRid'][$i];
					}
					
					if(isset($missionData['MSRid'][$i]) and is_numeric($missionData['MSRid'][$i])) {
						$missionSitrep->editMissionSitrep($MSRArray);
					}
					else {
						$missionSitrep->newMissionSitrep($MSRArray);
					}
				}
			}
			
			// Get total number of alien entries on Mission
			$alienCount = sizeof($missionData['alien_id']);
			
			for( $i = 0; $i < $alienCount; $i++ ) {
				$missionAlien = new MissionAlien();
				
				$MAArray['mission_id'] = $missionID;
				$MAArray['alien_id'] = $missionData['alien_id'][$i];
				$MAArray['encountered'] = $missionData['encountered'][$i];
				$MAArray['killed'] = $missionData['killed'][$i];
				if(isset($missionData['MAid'])) {
					$MAArray['id'] = $missionData['MAid'][$i];
				}
				
				if(isset($missionData['MAid'][$i]) and is_numeric($missionData['MAid'][$i])) {
					$missionAlien->editMissionAlien($MAArray);
				}
				else {
					$missionAlien->newMissionAlien($MAArray);
				}
			}
		}
		
		// Get total Number of Solders on Mission
		$soldierCount = sizeof($missionData['soldier_id']);
		
		for( $i = 0; $i < $soldierCount; $i++ ) {
			$missionSoldier = new SoldierMission();
			
			$shotsArray = explode("/",$missionData['shots'][$i]);
			$overwatchArray = explode("/",$missionData['overwatch'][$i]);
			$meleeArray = explode("/",$missionData['melee'][$i]);
			
			$MSArray['mission_id'] = $missionID;
			$MSArray['soldier_id'] = $missionData['soldier_id'][$i];
			$MSArray['rank_id'] = $missionData['rank_id'][$i];
			$MSArray['class_id'] = $missionData['class_id'][$i];
			$MSArray['shots_hit'] = $shotsArray[0];
			$MSArray['shots_taken'] = $shotsArray[1];
			$MSArray['overwatch_hit'] = $overwatchArray[0];
			$MSArray['overwatch_taken'] = $overwatchArray[1];
			$MSArray['melee_hit'] = $meleeArray[0];
			$MSArray['melee_taken'] = $meleeArray[1];
			$MSArray['damage'] = $missionData['damage'][$i];
			$MSArray['killed_aliens'] = $missionData['killed_aliens'][$i];
			$MSArray['killed_lost'] = $missionData['killed_lost'][$i];
			$MSArray['mvp'] = $missionData['mvp'][$i];
			$MSArray['status'] = $missionData['status'][$i];
			$MSArray['status_time'] = $missionData['status_time'][$i];
			$MSArray['extra'] = $missionData['extra'][$i];
			$MSArray['extra_info'] = $missionData['extra_info'][$i];
			$MSArray['promoted'] = $missionData['promoted'][$i];
			if(isset($missionData['MSid'][$i])) {
				$MSArray['id'] = $missionData['MSid'][$i];
			}
			
			if(isset($missionData['MSid'][$i]) and is_numeric($missionData['MSid'][$i])) {
				$missionSoldier->editSoldierMission($MSArray);
			}
			else {
				$missionSoldier->newSoldierMission($MSArray);
			}
		}

		header('Location: /mission/mission-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$missionID = $_GET['id'];
			$mission->getMission($missionID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="mission.php" method="post" id="mission-form" enctype="multipart/form-data" class="was-validated g-3" novalidate>
					<?php missionForm($mission); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>