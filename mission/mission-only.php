<?php
use XCOMDatabank\Missions\Mission;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$mission = new Mission();
$missionFields = [];

if(!empty($_POST)) {
    if(!empty($_FILES['picture']['name'])) {
        echo "File Dump:";
        print_r($_FILES);
        echo "\n";
        $_POST['picture'] = $_FILES['picture'];
    } else {
        if(isset($_POST['picture_current'])) {
            echo "POST Dump:";
            print_r($_POST);
            $_POST['picture'] = $_POST['picture_current'];
        }
    }
    //$errorMsg = $mission->processForm($_POST, '/mission/mission-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $missionID = intval($_GET['id']);
       //$mission->getMission($missionID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Mission</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="mission-only.php" method="post" id="mission-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Mission::getMissionForm($mission); ?>
            </div>

            <h2>Rewards</h2>
            <div class="mission-info row repeat-parent">
             <?php
                if($mission->reward == []) {
                    $mission->reward = [""];
                }
                $lastElement = end($mission->reward);
                $isLast = true;
                foreach ($mission->reward as $key => $value) {
                    if($value == $lastElement) {
                        $isLast = true;
                    } else {
                        $isLast = false;
                    }
                    ?>
                <div class="reward-field field-repeat entry col-md-3 pb-2 input-group-append">
                    <div class="row gx-2">
                        <?php Mission::getMissionRewards($value, $isLast); ?>
                    </div>
                </div>
             <?php
                } ?>
            </div>

            <h2>Mission Picture</h2>
            <div class="g-3 row">
                <?php Mission::getMissionPicture($mission->picture); ?>
            </div>


        <input type="submit" value="Submit" class="submit"> <input type="reset">
        </form>
        </div>
        <?php include_once __DIR__ . '/../php/scripts-include.php' ?>
        </body>
        </html>

        <?php
    }
    ?>