<?php
use XCOMDatabank\Management\Research;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$research = new Research();
if(!empty($_POST)) {
    $errorMsg = $research->processForm($_POST, '/management/research-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $researchID = $_GET['id'];
        $research->getResearch($researchID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Research</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="research.php" method="post" id="research-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Research::getResearchForm($research); ?>
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