<?php
use XCOMDatabank\Management\Info;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$info = new Info();
if(!empty($_POST)) {
    $errorMsg = $info->processForm($_POST, '/management/info-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $infoID = $_GET['id'];
        $info->getInfo($infoID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Info</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="info.php" method="post" id="info-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Info::getInfoForm($info); ?>
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