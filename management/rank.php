<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$rank = new Rank();
	
	if(!empty($_POST)) {
		$rankData = $_POST;
		if(is_numeric($_POST['id'])) {
			if(isset($_POST['deleted'])) {
				if($_POST['deleted'] == 1) {
					$rankData['icon'] = testImage($_FILES["icon"], 'rank', $rankData['label'], "Rank Image Upload");
				}
				else {
					$rankData['icon'] = null;
				}
			}
			else {
				$rankData['icon'] = null;
			}
			
			$rank->editRank($rankData);
		}
		else {
			if(!empty($_FILES)) {
				$rankData['icon'] = testImage($_FILES["icon"], 'rank', $rankData['label'], "Rank Image Upload");
			}
			$rank->newRank($rankData);
		}
		createClassJson();
		header('Location: /management/rank-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$rankID = $_GET['id'];
			$rank->getRank($rankID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="rank.php" method="post" id="rank-form" enctype="multipart/form-data">
					<?php rankForm($rank); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>