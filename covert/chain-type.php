<?php
use XCOMDatabank\Covert\ActivityChainType;

include_once __DIR__ . '../../project/adminInclude.php';

$errorMsg = "";
$chainType = new ActivityChainType();
if(!empty($_POST)) {
    $errorMsg = $chainType->processForm($_POST, '/covert/chain-type-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $chainTypeID = $_GET['id'];
        $chainType->getActivityChainType($chainTypeID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Activity Chain Type</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="chain-type.php" method="post" id="chain-type-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php ActivityChainType::getActivityChainTypeForm($chainType); ?>
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