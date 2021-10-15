<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$covertType = new CovertType();
	
	if(!empty($_POST)) {
		$covertTypeData = $_POST;
		
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$covertType->editCovertType($covertTypeData);
			}
		}
		else {
			$covertType->newCovertType($covertTypeData);
		}
		createCovertJson();
		header('Location: /covert/covert-type-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$covertTypeID = $_GET['id'];
			$covertType->getCovertType($covertTypeID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="covert-type.php" method="post" id="covert-type">
					<?php covertTypeForm($covertType); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>