<?php
use XCOMDatabank\Aliens\Chosen;

include_once __DIR__.'/../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of Chosen</h2>
    <?php Chosen::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>