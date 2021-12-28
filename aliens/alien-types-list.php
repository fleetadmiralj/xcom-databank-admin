<?php
use XCOMDatabank\Aliens\AlienType;

include_once __DIR__.'../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of All Alien Types</h2>
    <p><a href="alien-types.php">Add new Alien Type</a></p>
    <?php AlienType::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>