<?php
use XCOMDatabank\Missions\MissionType;

include_once __DIR__.'../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
        <?php include_once __DIR__.'/../php/page-head.php' ?>
			<div id="main">
				<h2 class="list-header">List of All Mission Types</h2>
				<p><a href="mission-type.php">Add new Mission Type</a></p>
				<?php MissionType::getListPage(); ?>
			</div>
	<?php include_once __DIR__.'/../php/scripts-include.php' ?>
	</body>
</html>