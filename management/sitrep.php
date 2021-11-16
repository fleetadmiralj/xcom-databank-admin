<?php
use XCOMDatabank\Management\Sitrep;

include_once __DIR__ . '../../project/adminInclude.php';

$errorMsg = "";
$sitrep = new Sitrep();
if(!empty($_POST)) {
    $errorMsg = $sitrep->processForm($_POST, '/management/sitrep-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $sitrepID = $_GET['id'];
        $sitrep->getSitrep($sitrepID);
    }
    ?>

<!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit SITREP</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="sitrep.php" method="post" id="sitrep-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Sitrep::getSitrepForm($sitrep); ?>
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