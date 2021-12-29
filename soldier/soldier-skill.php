<?php
use XCOMDatabank\Soldiers\SoldierSkill;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$soldierSkill = new SoldierSkill();
if(!empty($_POST)) {
    $errorMsg = $soldierSkill->processForm($_POST, '/soldier/soldier-skill-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $soldierSkillID = $_GET['id'];
        $soldierSkill->getSoldierSkill($soldierSkillID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Soldier/Skill</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="soldier-skill.php" method="post" id="soldier-skill-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php SoldierSkill::getSoldierSkillForm($soldierSkill); ?>
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