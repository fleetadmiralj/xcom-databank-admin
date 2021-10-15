<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$activityChain = new ActivityChain();
	$activityChainFields = [];
	
	if(!empty($_POST)) {
		$chainData = $_POST;
		
		// Fill variable with just Base Activity Chain variables
		$activityChainFields['type'] = $chainData['type'];
		$activityChainFields['title'] = $chainData['title'];
		$activityChainFields['status'] = $chainData['status'];
		$activityChainFields['start_date'] = $chainData['start_date'];
		$activityChainFields['end_date'] = $chainData['end_date'];
		
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$activityChainFields['id'] = $chainData['id'];
				$activityChain->editActivityChain($activityChainFields);
			}
		}
		else {
			$activityChain->newActivityChain($activityChainFields);
		}
		
		// Get the Activity Chain ID
		$chainID = $activityChain->id;
		
		// Get total Number of Steps in Activity Chain
		$stepCount = sizeof($chainData['stepNum']);
		
		// Loop through and Add/Edit steps in Activity Chain
		for( $i = 0; $i < $stepCount; $i++ ) {
			$chainStep = new ActivityChainStep();
			$stepArray = [];
			
			if(isset($chainData['stepID'][$i])) {
				$stepArray['id'] = $chainData['stepID'][$i];
			}
			$stepArray['chain'] = $chainID;
			$stepArray['step'] = $chainData['stepNum'][$i];
			$stepArray['type'] = $chainData['stepType'][$i];
			$stepArray['mission'] = $chainData['stepMission'][$i];
			$stepArray['covert'] = $chainData['stepCovert'][$i];
			$stepArray['status'] = $chainData['stepStatus'][$i];
			
			if(isset($chainData['stepID'][$i])) {
				if(is_numeric($chainData['stepID'][$i])) {
					$chainStep->editActivityChainStep($stepArray);
				}
			}
			else {
				$chainStep->newActivityChainStep($stepArray);
			}
		}
		header('Location: /mission/chain-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$chainID = $_GET['id'];
			$activityChain->getActivityChain($chainID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form activity="chain.php" method="post" id="chain-form">
					<?php chainForm($activityChain); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>