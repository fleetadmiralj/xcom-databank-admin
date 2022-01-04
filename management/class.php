<?php
use XCOMDatabank\Management\SoldierClass;

include_once __DIR__ . '/../../project/adminInclude.php';

$errorMsg = "";
$class = new SoldierClass();
if(!empty($_POST)) {
    print_r($_POST);
    $_POST['icon'] = $_FILES['userfile'];
    $errorMsg = $class->processForm($_POST, '/management/class-list.php');
}
else {
    if(isset($_GET['id']) and is_numeric($_GET['id'])) {
        $classID = $_GET['id'];
        $class->getClass($classID);
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main" class="controls input-group">
        <h2 class="list-header">Add/Edit Class</h2>
        <?php
        if($errorMsg != "") {
            ?>
            <p class="text-danger"><strong><?php echo $errorMsg; ?></strong></p>
            <?php
        }
        ?>
        <form action="class.php" method="post" id="class-form" enctype="multipart/form-data" class="was-validated" novalidate>
            <div class="g-3 row">
                <?php SoldierClass::getClassForm($class); ?>
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