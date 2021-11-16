<?php
use XCOMDatabank\Aliens\Chosen;

include_once __DIR__.'../../project/adminInclude.php';

$errorMsg = "";
$chosen = new Chosen();
if(!empty($_POST)) {
    $errorMsg = $chosen->processForm($_POST, '/aliens/chosen-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $chosenID = $_GET['id'];
        $chosen->getChosen($chosenID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Edit Chosen</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="chosen.php" method="post" id="chosen-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Chosen::getChosenForm($chosen); ?>
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