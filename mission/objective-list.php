<?php
use XCOMDatabank\Missions\Objective;

include_once __DIR__.'../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
        <?php include_once __DIR__.'/../php/page-head.php' ?>
			<div id="main">
				<h2 class="list-header">List of All Mission Objectives</h2>
				<p><a href="objective.php">Add new Mission Objective</a></p>
                <?php Objective::getListPage(); ?>
			</div>
        <?php include_once __DIR__.'/../php/scripts-include.php' ?>
	</body>
</html>