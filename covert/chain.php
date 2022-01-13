<?php
use XCOMDatabank\Covert\ActivityChain;
use XCOMDatabank\Covert\ActivityChainStep;

include_once __DIR__.'/../../project/adminInclude.php';

$errorMsg = "";
$chain = new ActivityChain();
$chainFields = [];

if(!empty($_POST)) {
    $errorMsg = $chain->processForm($_POST);

    // Get the soldier ID
    $chainID = $chain->id;

    // Get Chain Steps and Submit
    if(!empty($_POST['step'])) {
        for( $i = 0; $i < sizeof($_POST['step']); $i++ ) {
            $step = new ActivityChainStep();
            $chainFields['chain'] = $chainID;
            $chainFields['step_id'] = $_POST['step_id'][$i];
            $chainFields['step'] = $_POST['step'][$i];
            $chainFields['step_type'] = $_POST['step_type'][$i];
            $chainFields['step_mission'] = $_POST['step_mission'][$i] ?? null;
            $chainFields['step_covert'] = $_POST['step_covert'][$i] ?? null;
            $chainFields['step_status'] = $_POST['step_status'][$i];
            $errorMsg .= $step->processForm($chainFields);
        }
    }
    header('Location: /covert/chain-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $chainID = $_GET['id'];
        $chain->getActivityChain($chainID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Activity Chain</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="chain.php" method="post" id="chain-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php ActivityChain::getActivityChainForm($chain); ?>
            </div>

            <h2>Steps</h2>
            <?php ActivityChain::getStepsForm($chain); ?>

            <input type="submit" value="Submit" class="submit"> <input type="reset">
        </form>
    </div>
    <?php include_once __DIR__.'/../php/scripts-include.php' ?>
    </body>
    </html>

    <?php
}
?>