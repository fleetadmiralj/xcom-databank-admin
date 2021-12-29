<?php
use XCOMDatabank\Soldiers\SoldierSkill;

include_once __DIR__.'/../../project/adminInclude.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include_once __DIR__.'/../php/header-include.php' ?>
<body>
<?php include_once __DIR__.'/../php/page-head.php' ?>
<div id="main">
    <h2 class="list-header">List of All Soldier/Skill</h2>
    <p><a href="soldier-skill.php">Add new Soldier/Skill</a></p>
    <?php SoldierSkill::getListPage(); ?>
</div>
<?php include_once __DIR__.'/../php/scripts-include.php' ?>
</body>
</html>