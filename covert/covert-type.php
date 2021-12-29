<?php
use XCOMDatabank\Covert\CovertType;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$covertType = new CovertType();
if(!empty($_POST)) {
    $errorMsg = $covertType->processForm($_POST, '/covert/covert-type-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $covertTypeID = $_GET['id'];
        $covertType->getCovertType($covertTypeID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Covert Type</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="covert-type.php" method="post" id="covert-type-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php CovertType::getCovertTypeForm($covertType); ?>
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