<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$objective = new Objective();
	
	if(!empty($_POST)) {
		$objectiveData = $_POST;
		
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$objective->editObjective($objectiveData);
			}
		}
		else {
			$objective->newObjective($objectiveData);
		}
		createMissionJson();
		header('Location: /mission/objective-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$objectiveID = $_GET['id'];
			$objective->getObjective($objectiveID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="objective.php" method="post" id="objective-form">
					<?php objectiveForm($objective); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>