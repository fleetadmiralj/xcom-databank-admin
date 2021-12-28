<?php
use XCOMDatabank\Aliens\MOCXMission;

include_once __DIR__ . '../../project/adminInclude.php';

$errorMsg = "";
$mocxMission = new MOCXMission();
if(!empty($_POST)) {
    $errorMsg = $mocxMission->processForm($_POST, '/aliens/mocx-mission-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $mocxMissionID = $_GET['id'];
        $mocxMission->getMOCXMission($mocxMissionID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit MOCX Mission</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="mocx-mission.php" method="post" id="mocx-mission-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php MOCXMission::getMOCXMissionForm($mocxMission); ?>
            </div>
            <div class="g-3 row">
                <div class="col-12">
                    <button type="submit" id="submit" class="submit btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>
    <?php include_once __DIR__ . '/../php/scripts-include.php' ?>
    </body>
    </html>

    <?php
}
?>