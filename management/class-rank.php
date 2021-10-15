<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$classRank = new ClassRank();
	
	if(!empty($_POST)) {
		$classRankData = $_POST;
		if(is_numeric($_POST['id'])) {
			$classRank->editClassRank($classRankData);
		}
		else {
			$classRank->newClassRank($classRankData);
		}
		createClassJson();
		header('Location: /management/class-rank-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$classRankID = $_GET['id'];
			$classRank->getClassRank($classRankID);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="class-rank.php" method="post" id="class-rank-form">
					<?php classRankForm($classRank); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>