<?php
use XCOMDatabank\Missions\MissionSoldier;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$missionSoldier = new MissionSoldier;

if(!empty($_POST)) {
    $errorMsg = $missionSoldier->processForm($_POST, '/mission/objective-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $missionSoldierID = $_GET['id'];
        $missionSoldier->getMissionSoldier($missionSoldierID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Mission Soldier</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="mission-soldier.php" method="post" id="mission-soldier-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php MissionSoldier::getMissionSoldierForm($missionSoldier, false, true); ?>
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