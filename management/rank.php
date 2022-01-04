<?php
use XCOMDatabank\Management\Rank;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$rank = new Rank();
if(!empty($_POST)) {
    if(!empty($_FILES['icon']['name'])) {
        $_POST['icon'] = $_FILES['icon'];
    } else {
        $_POST['icon'] = $_POST['icon_current'];
    }
    $errorMsg = $rank->processForm($_POST, '/management/rank-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $rankID = $_GET['id'];
        $rank->getRank($rankID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Rank</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="rank.php" method="post" id="rank-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php Rank::getRankForm($rank); ?>
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