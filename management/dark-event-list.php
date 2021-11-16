<?php
use XCOMDatabank\Management\DarkEvent;

include_once __DIR__ . '../../project/adminInclude.php'; ?>

    <!DOCTYPE html>
    <html lang="en">
<?php include_once __DIR__ . '/../php/header-include.php' ?>
    <body>
    <?php include_once __DIR__ . '/../php/page-head.php' ?>
    <div id="main">
        <h2 class="list-header">List of All Dark Events</h2>
        <p><a href="dark-event.php">Add new Dark Event</a></p>
        <?php DarkEvent::getListPage(); ?>
    </div>
    <?php include_once __DIR__ . '/../php/scripts-include.php' ?>
    </body>
    </html>