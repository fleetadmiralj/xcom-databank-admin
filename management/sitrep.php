<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$sitrep = new Sitrep();
	
	if(!empty($_POST)) {
		$sitrepData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$sitrep->editSitrep($sitrepData);
			}
		}
		else {
			$sitrep->newSitrep($sitrepData);
		}
		
		header('Location: /management/sitrep-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$sitrepID = $_GET['id'];
			$sitrep->getSitrep($sitrepID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="sitrep.php" method="post" id="sitrep-form">
					<?php sitrepForm($sitrep); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>