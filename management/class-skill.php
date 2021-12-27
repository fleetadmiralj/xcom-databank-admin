<?php
use XCOMDatabank\Management\ClassSkill;

include_once __DIR__ . '../../project/adminInclude.php';

$errorMsg = "";
$classSkill = new ClassSkill();
if(!empty($_POST)) {
    $errorMsg = $classSkill->processForm($_POST, '/management/class-skill-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $classSkillID = $_GET['id'];
        $classSkill->getClassSkill($classSkillID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Class/Skill</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="class-skill.php" method="post" id="class-skill-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php ClassSkill::getClassSkillForm($classSkill); ?>
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