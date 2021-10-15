<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$chosen = new Chosen();
	
	if(!empty($_POST)) {
		$chosenData = $_POST;
		if(is_numeric($_POST['id'])) {
			$chosen->editChosen($chosenData);
		}
		else {
			$chosen->newChosen($chosenData);
		}
		header('Location: /aliens/chosen-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$chosenID = $_GET['id'];
			$chosen->getChosen($chosenID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="chosen.php" method="post" id="chosen-form">
					<?php chosenForm($chosen); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>