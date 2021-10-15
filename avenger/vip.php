<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$vip = new VIP();
	
	if(!empty($_POST)) {
		$vipData = $_POST;
		if(isset($_POST['id'])) {
			if(is_numeric($_POST['id'])) {
				$vip->editVIP($vipData);
			}
		}
		else {
			$vip->newVIP($vipData);
		}
		header('Location: /avenger/vip-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$vipID = $_GET['id'];
			$vip->getVIP($vipID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="vip.php" method="post" id="vip-form">
					<?php vipForm($vip); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>