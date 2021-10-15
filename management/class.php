<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$class = new SoldierClass();
	
	if(!empty($_POST)) {
		$classData = $_POST;
		if(is_numeric($_POST['id'])) {
			if(isset($_POST['deleted'])) {
				if($_POST['deleted'] == 1) {
					$classData['icon'] = testImage($_FILES["icon"], 'class', $classData['name'], "Class Image Upload");
				}
				else {
					$classData['icon'] = null;
				}
			}
			else {
				$classData['icon'] = null;
			}
			
			$class->editClass($classData);
		}
		else {
			if(!empty($_FILES)) {
				$classData['icon'] = testImage($_FILES["icon"], 'class', $classData['name'], "Class Image Upload");
			}
			$class->newClass($classData);
		}
		createClassJson();
		header('Location: /management/class-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$classID = $_GET['id'];
			$class->getClass($classID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="class.php" method="post" id="class-form" enctype="multipart/form-data">
					<?php classForm($class); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>