<?php use XCOMDatabank\Management\DarkEvent;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$darkEvent = new DarkEvent();

if(!empty($_POST)) {
    $errorMsg = $darkEvent->processForm($_POST, '/management/dark-event-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $darkEventID = $_GET['id'];
        $darkEvent->getDarkEvent($darkEventID);
    }
    ?>

<!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Dark Events</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="dark-event.php" method="post" id="dark-event-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php DarkEvent::getDarkEventForm($darkEvent); ?>
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