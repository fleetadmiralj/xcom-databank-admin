<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$research = new Research();
	
	if(!empty($_POST)) {
		$researchData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$research->editResearch($researchData);
			}
		}
		else {
			$research->newResearch($researchData);
		}
		header('Location: /avenger/research-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$researchID = $_GET['id'];
			$research->getResearch($researchID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="research.php" method="post" id="vip-form">
					<?php researchForm($research); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>