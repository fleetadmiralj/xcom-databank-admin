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

    // Get Soldier Skills and Submit
    for( $i = 0; $i < sizeof($soldierData['skills']); $i++ ) {
        $soldierSkill = new SoldierSkill;
        $soldierSkillFields['soldier_id'] = $soldierID;
        if(isset($soldierData['soldierSkill_id'])) {
            $soldierSkillFields['soldierSkill_id'] = $soldierData['soldierSkill_id'][$i];
        } else {
            $soldierSkillFields['soldierSkill_id'] = null;
        }
        $soldierSkillFields['skill_id'] = $soldierData['skills'][$i];
        $errorMsg .= $soldierSkill->processForm($soldierSkillFields);
    }

    if(!empty($_POST['skills'])) {
        foreach($_POST['skills'] as $item) {
            $soldierSkill = new SoldierSkill;
            $soldierSkillFields['soldierSkill_id'] = $soldierID;
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