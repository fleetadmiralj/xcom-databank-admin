<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$soldier = new Soldier();
	$soldierSkill = new SoldierSkill;
	
	if(!empty($_POST)) {
		$soldierData = $_POST;

		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				if(isset($_POST['delete'])) {
					if(!empty($_FILES)) {
						$soldierData['photo'] = $_FILES["picture"];
					}
					else {
						$soldierData['photo'] = null;
					}
				}
				else {
					if(!empty($soldierData['currentphoto'])) {
						$soldierData['photo'] = $soldierData['currentphoto'];
					}
					elseif(!empty($_FILES)) {
						$soldierData['photo'] = $_FILES["picture"];
					}
					else {
						$soldierData['photo'] = null;
					}
				}
				
				$soldier->editSoldier($soldierData);
				
				$skills['soldier_id'] = $soldierData['id'];
				
				if(!empty($soldierData['skills']) or !empty($soldierData['skillsID'])) {
					if(!empty($soldierData['skills'])) {
						sort($soldierData['skills']);
					}
					
					if(!empty($soldierData['skillsID'])) {
						sort($soldierData['skillsID']);
					}
					else {
						$soldierData['skillsID'] = [];
					}
					
					foreach ($soldierData['skills'] as $value) {
						if(!in_array($value, $soldierData['skillsID'])) {
							$skills['skill_id'] = $value;
							$soldierSkill->newSoldierSkill($skills);
						}
					}
				}
			}
		}
		else {
			if(!empty($_FILES)) {
				$soldierData['photo'] = $_FILES["picture"];
			}
			$soldier->newSoldier($soldierData);
				
			if(!empty($soldierData['skills'])) {
				$skillCount = sizeof($soldierData['skills']);
				for( $i = 0; $i < $skillCount; $i++ ) {
					$skills['soldier_id'] = $soldier->id;
					$skills['skill_id'] = $soldierData['skills'][$i];
					$soldierSkill->newSoldierSkill($skills);
				}
			}
		}

		header('Location: /soldier/soldier-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$soldierID = $_GET['id'];
			$soldier->getSoldier($soldierID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="soldier.php" method="post" id="soldier-form" enctype="multipart/form-data">
					<?php soldierForm($soldier); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>