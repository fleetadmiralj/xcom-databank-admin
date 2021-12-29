<?php
use XCOMDatabank\Covert\ActivityChainType;

include_once __DIR__.'/../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of All Activity Chain Types</h2>
    <p><a href="chain-type.php">Add new Activity Chain Type</a></p>
    <?php ActivityChainType::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>