<?php
use XCOMDatabank\Management\VIP;

include_once __DIR__ . '../../project/adminInclude.php';

$errorMsg = "";
$vip = new VIP();
if(!empty($_POST)) {
    $errorMsg = $vip->processForm($_POST, '/management/vip-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $vipID = $_GET['id'];
        $vip->getVIP($vipID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit VIP</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="vip.php" method="post" id="vip-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php VIP::getVIPForm($vip); ?>
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