<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$alienType = new AlienType;
	
	if(!empty($_POST)) {
		$alienTypeData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$alienType->editAlienType($alienTypeData);
			}
		}
		else {
			$alienType->newAlienType($alienTypeData);
		}
		createAlienJson();
		header('Location: ../lists/alien-types.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$alienTypeID = $_GET['id'];
			$alienType->getAlienType($alienTypeID);
		} ?>
		
<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="alien-types.php" method="post" id="alien-type-form">
					<?php alienTypeForm($alienType); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>
		
<?php		
	}	
?>