<?php
use XCOMDatabank\Missions\MissionAlien;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$missionAlien = new MissionAlien;

if(!empty($_POST)) {
    $errorMsg = $missionAlien->processForm($_POST, '/mission/mission-alien-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $missionAlienID = intval($_GET['id']);
        $missionAlien->getMissionAlien($missionAlienID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Mission Alien</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="mission-alien.php" method="post" id="mission-alien-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php MissionAlien::getMissionAlienForm($missionAlien, false, true); ?>
            </div>

            <div class="g-3 row">
                <div class="col-12">
                    <button type="submit" id="submit" class="submit btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
    <?php include_once __DIR__.'/../php/scripts-include.php' ?>
    </body>
    </html>

    <?php
}