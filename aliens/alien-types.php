<?php
use XCOMDatabank\Aliens\AlienType;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$alienType = new AlienType();
if(!empty($_POST)) {
    $errorMsg = $alienType->processForm($_POST, '/aliens/alien-types-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $alienTypeID = $_GET['id'];
        $alienType->getAlienType($alienTypeID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Alien Type</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="alien-types.php" method="post" id="alien-type-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php AlienType::getAlienTypeForm($alienType); ?>
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