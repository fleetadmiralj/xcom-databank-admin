<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$bond = new Bonds();
	
	if(!empty($_POST)) {
		$bondData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$bond->editBond($bondData);
			}
		}
		else {
			$bond->newBond($bondData);
		}
		header('Location: /soldier/bonds-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$bondID = $_GET['id'];
			$bond->getBond($bondID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="bonds.php" method="post" id="bond-form">
					<?php bondForm($bond); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>