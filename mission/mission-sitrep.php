<?php
use XCOMDatabank\Missions\MissionSitrep;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$missionSitrep = new MissionSitrep();
if(!empty($_POST)) {
    $errorMsg = $missionSitrep->processForm($_POST, '/mission/mission-sitrep-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $missionSitrepID = $_GET['id'];
        $missionSitrep->getMissionSitrep($missionSitrepID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Mission SITREP</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="mission-sitrep.php" method="post" id="mission-sitrep-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php MissionSitrep::getMissionSitrepForm($missionSitrep); ?>
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
?>