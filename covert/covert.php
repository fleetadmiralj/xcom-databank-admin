<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$covertAction = new CovertAction();
	$covertActionFields = [];
	
	if(!empty($_POST)) {
		$covertData = $_POST;
		
		// Fill variable with just Covert Action variables
		$covertActionFields['faction'] = $covertData['faction'];
		$covertActionFields['type'] = $covertData['type'];
		$covertActionFields['mission'] = $covertData['mission'];
		//$covertActionFields['mission_desc'] = $covertData['mission_desc'];
		$covertActionFields['reward'] = $covertData['reward'];
		//$covertActionFields['reward_desc'] = $covertData['reward_desc'];
		$covertActionFields['location'] = $covertData['location']; // will be replaced w/ sector after this season
		$covertActionFields['start_date'] = $covertData['startDate'];
		$covertActionFields['end_date'] = $covertData['endDate'];
		$covertActionFields['status'] = $covertData['status'];
		$covertActionFields['is_chain'] = $covertData['is_chain'];
		
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$covertActionFields['id'] =$covertData['id'];
				$covertAction->editCovertAction($covertActionFields);
			}
		}
		else {
			$covertAction->newCovertAction($covertActionFields);
		}
		
		// Get the covert op ID
		$covertID = $covertAction->id;
		
		// Get total Number of Solders on Mission
		$operativeCount = sizeof($covertData['operative']);
		
		// Loop through and Add/Edit covert operatives on mission
		for( $i = 0; $i < $operativeCount; $i++ ) {
			$covertOperative = new CovertOperative();
			$OpArray = [];
			
			if(isset($covertData['OpID'])) {
				$OpArray['id'] = $covertData['OpID'][$i];
			}
			$OpArray['action_id'] = $covertID;
			$OpArray['soldier_id'] = $covertData['operative'][$i]; // will be 'soldier_id' next season. Either operative or resource must be null (or empty in the form submission)
			$OpArray['resource'] = $covertData['resource'][$i]; // Instead of putting resource/operative into single field, we'll split it up. that means we can't disable he fields anymore, though
			$OpArray['requirement'] = $covertData['requirement'][$i];
			$OpArray['reward'] = $covertData['opReward'][$i];
			$OpArray['promoted'] = $covertData['promoted'][$i];
			$OpArray['status'] = $covertData['opStatus'][$i];
			
			if(isset($covertData['OpID'][$i]) and is_numeric($covertData['OpID'][$i])) {
				$covertOperative->editCovertOperative($OpArray);
			}
			else {
				$covertOperative->newCovertOperative($OpArray);
			}
		}
		
		header('Location: /covert/covert-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$covertID = $_GET['id'];
			$covertAction->getCovertAction($covertID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="covert.php" method="post" id="covert-form">
					<?php covertForm($covertAction); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>