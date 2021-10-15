<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$alien = new Alien;
	
	if(!empty($_POST)) {
		$alienData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				if(isset($_POST['deleted'])) {
					if($_POST['deleted'] == 1 and !empty($_FILES)) {
						$alienData['picture'] = $_FILES["picture"];
					}
					else {
						$alienData['picture'] = null;
					}
				}
				else {
					$alienData['picture'] = null;
				}
				
				$alien->editAlien($alienData);
			}
		}
		else {
			if(!empty($_FILES)) {
				$alienData['picture'] = $_FILES['picture'];
			} else {
				$alienData['picture'] = null;
			}
			$alien->newAlien($alienData);
		}
		createAlienJson();
		header('Location: ../lists/aliens.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$alienID = $_GET['id'];
			$alien->getAlien($alienID);
		} ?>
		
<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="aliens.php" method="post" id="alien-form">
					<?php alienForm($alien); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>
		
<?php		
	}	
?>