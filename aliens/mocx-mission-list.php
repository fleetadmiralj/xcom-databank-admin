<?php
use XCOMDatabank\Aliens\MOCXMission;

include_once __DIR__.'../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of All MOCX Missions</h2>
    <p><a href="mocx-mission.php">Add new MOCX Mission</a></p>
    <?php MOCXMission::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>