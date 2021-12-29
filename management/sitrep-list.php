<?php
use XCOMDatabank\Management\Sitrep;

include_once __DIR__.'/../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of All SITREPs</h2>
    <p><a href="sitrep.php">Add new SITREP</a></p>
    <?php Sitrep::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>