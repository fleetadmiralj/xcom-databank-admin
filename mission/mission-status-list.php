<?php
use XCOMDatabank\Missions\MissionStatus;

include_once __DIR__.'../../project/adminInclude.php'; ?>

    <!DOCTYPE html>
    <html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main">
        <h2 class="list-header">List of All Mission Statuses</h2>
        <p><a href="mission-status.php">Add new Mission Status</a></p>
        <?php MissionStatus::getListPage(); ?>
    </div>
    <?php include_once __DIR__.'/../php/scripts-include.php' ?>
    </body>
    </html>