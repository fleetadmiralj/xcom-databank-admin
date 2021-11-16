<?php
use XCOMDatabank\Missions\MissionSitrep;

include_once __DIR__.'../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of All Mission SITREPs</h2>
    <p><a href="mission-status.php">Add new Mission SITREP</a></p>
    <?php MissionSitrep::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>