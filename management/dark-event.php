<?php include_once '/home/joshch9/project/adminInclude.php' ?>
<?php

	$darkEvent = new DarkEvent();
	
	if(!empty($_POST)) {
		$darkEventData = $_POST;
		
		if(is_numeric($_POST['id'])) {
			$darkEvent->editDarkEvent($darkEventData);
		}
		else {
			$darkEvent->newDarkEvent($darkEventData);
		}
		
		header('Location: /management/dark-event-list.php');
	}
	else {
		if(isset($_GET['id']) and is_numeric($_GET['id'])) {
			$darkEventData = $_GET['id'];
			$darkEvent->getDarkEvent($darkEventData);
		} ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/header-include.php' ?>
<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/page-head.php' ?>
			<div id="main" class="controls input-group">
				<form action="dark-event.php" method="post" id="dark-event-form">
					<?php darkEventForm($darkEvent); ?>
					
					<input type="submit" value="Submit" class="submit"> <input type="reset">
					
				</form>
			</div>
	<?php include_once $_SERVER['DOCUMENT_ROOT'].'/php/scripts-include.php' ?>
	</body>
</html>

<?php		
	}	
?>