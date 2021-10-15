<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$classSkill = new ClassSkill();
	
	if(!empty($_POST)) {
		$classSkillData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$classSkill->editClassSkill($classSkillData);
			}
		} else {
			$classSkill->newClassSkill($classSkillData);
		}
		createClassJson();
		header('Location: /management/class-skill-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$classSkillID = $_GET['id'];
			$classSkill->getClassSkill($classSkillID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="class-skill.php" method="post" id="class-skill-form">
					<?php classSkillForm($classSkill); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>