<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$skill = new Skill();
	
	if(!empty($_POST)) {
		$skillData = $_POST;
		if(is_numeric($_POST['id'])) {
			if(isset($_POST['deleted'])) {
				if($_POST['deleted'] == 1) {
					$skillData['icon'] = testImage($_FILES["icon"], 'skill', $skillData['name'], "Skill Image Upload");
				}
				else {
					$skillData['icon'] = null;
				}
			}
			else {
				$skillData['icon'] = null;
			}
			
			$skill->editSkill($skillData);
		}
		else {
			if(!empty($_FILES)) {
				$skillData['icon'] = testImage($_FILES["icon"], 'skill', $skillData['name'], "Skill Image Upload");
			}
			$skill->newSkill($skillData);
		}
		createClassJson();
		header('Location: /management/skills-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$skillID = $_GET['id'];
			$skill->getSkill($skillID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="skills.php" method="post" id="skill-form" enctype="multipart/form-data">
					<?php skillForm($skill); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>