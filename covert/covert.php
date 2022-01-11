<?php
use XCOMDatabank\Covert\CovertAction;
use XCOMDatabank\Covert\CovertOperative;

include_once __DIR__.'/../../project/adminInclude.php';
$errorMsg = "";
$action = new CovertAction();
$operativeFields = [];

if(!empty($_POST)) {
    $errorMsg = $action->processForm($_POST);

    // Get the soldier ID
    $actionID = $action->id;

    // Get Soldier Skills and Submit
    for( $i = 0; $i < sizeof($_POST['requirement']); $i++ ) {
        $operative = new CovertOperative;
        $operativeFields['action_id'] = $actionID;
        $operativeFields['soldier_id'] = $_POST['soldier_id'][$i];
        $operativeFields['resource'] = $_POST['resource'][$i];
        $operativeFields['requirement'] = $_POST['requirement'][$i];
        $operativeFields['opReward'] = $_POST['opReward'][$i];
        $operativeFields['opStatus'] = $_POST['opStatus'][$i];
        $operativeFields['promoted'] = $_POST['promoted'][$i];
        $errorMsg .= $operative->processForm($operativeFields);
    }
    header('Location: /covert/covert-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $actionID = $_GET['id'];
        $action->getCovertAction($actionID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__.'/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__.'/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Covert Action</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="covert.php" method="post" id="covert-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php CovertAction::getCovertActionForm($action); ?>
            </div>

            <h2>Operatives</h2>
            <?php CovertAction::getOperativesForm($action); ?>

            <input type="submit" value="Submit" class="submit"> <input type="reset">
        </form>
    </div>
    <?php include_once __DIR__.'/../php/scripts-include.php' ?>
    </body>
    </html>

    <?php
}
?>