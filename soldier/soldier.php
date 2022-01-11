<?php
use XCOMDatabank\Soldiers\Soldier;
use XCOMDatabank\Soldiers\SoldierSkill;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$soldier = new Soldier();

if(!empty($_POST)) {
    if(!empty($_FILES['picture']['name'])) {
        $_POST['picture'] = $_FILES['picture'];
    } else {
        $_POST['picture'] = $_POST['picture_current'];
    }
    $soldierData = $_POST;
    $errorMsg = $soldier->processForm($soldierData);

    // Get the soldier ID
    $soldierID = $soldier->id;

    // Dumps all CURRENT soldier skill IDs into an array to access later
    $ssidArray = $soldierData['soldierSkill_id'] ?? null;

    // Run through all checked skills
    if(!empty($_POST['skills'])) {
        foreach($_POST['skills'] as $item) {
            $soldierSkill = new SoldierSkill;

            // If the soldier/skill combo exists in the database, get the soldier skill ID, otherwise, get null
            $hasSkill = SoldierSkill::getSoldierSkillIDbySkill($item, $soldierID);

            // If the skill exists, and the skill is at the front of the SSID array,
            // then send the ID as soldierSkill_id to processForm and remove the item from the SSID array
            if(is_array($ssidArray) and !empty($ssidArray)) {
                if($hasSkill == $ssidArray[0]) {
                    $soldierSkillFields['soldierSkill_id'] = $hasSkill;
                    array_shift($ssidArray);
                }
            }

            $soldierSkillFields['soldier_id'] = $soldierID;
            $soldierSkillFields['skill_id'] = $item;
            $errorMsg .= $soldierSkill->processForm($soldierSkillFields);
        }
    }

    header('Location: /soldier/soldier-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $soldierID = $_GET['id'];
        $soldier->getSoldier($soldierID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Soldier</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="soldier.php" method="post" id="soldier-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Soldier::getSoldierForm($soldier); ?>
            </div>

            <h2>Soldier Skills</h2>
            <?php Soldier::getSoldierSkillsForm($soldier); ?>

            <input type="submit" value="Submit" class="submit"> <input type="reset">
        </form>
    </div>
    <?php include_once __DIR__.'/../php/scripts-include.php' ?>
    </body>
    </html>

    <?php
}
?>