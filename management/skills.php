<?php
use XCOMDatabank\Management\Skill;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$skill = new Skill();
if(!empty($_POST)) {
    print_r($_POST);
    if(!empty($_FILES['icon']['name'])) {
        $_POST['icon'] = $_FILES['icon'];
    } else {
        $_POST['icon'] = null;
    }
    //$errorMsg = $skill->processForm($_POST, '/management/skills-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $skillID = $_GET['id'];
        $skill->getSkill($skillID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Skill</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="skills.php" method="post" id="skill-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Skill::getSkillForm($skill); ?>
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