<?php
use XCOMDatabank\Aliens\Alien;

include_once __DIR__ . '../../project/adminInclude.php';

$errorMsg = "";
$alien = new Alien();
if(!empty($_POST)) {
    $errorMsg = $alien->processForm($_POST, '/aliens/aliens-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $alienID = $_GET['id'];
        $alien->getAlien($alienID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Alien</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="aliens.php" method="post" id="alien-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Alien::getAlienForm($alien); ?>
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