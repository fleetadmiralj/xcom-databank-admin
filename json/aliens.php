<?php

include_once __DIR__.'/../../project/adminInclude.php';

use XCOMDatabank\Management\Info;
use XCOMDatabank\Utility\Database;

$currentFL = Info::getForceLevel();

$query = "SELECT * FROM xcom_alien_type WHERE enabled = true and min_force <= :forceLevel ORDER BY faction, name";
$params[0] = array("param" => ":min_force", "var" => $currentFL, "type" => PDO::PARAM_INT,);

$queryResult = Database::runQuery('select', $query, $params);
		
$alienArray = [];
		
while ($row = $queryResult->fetch()) {
			
    $alienArray[$row['name']] = [];

    $query = 'SELECT id, name FROM xcom_aliens WHERE type_id = :id and enabled = true and min_force <= :force and max_force >= :force';
    $params[0] = array("param" => ":id", "var" => $row['id'], "type" => PDO::PARAM_INT,);
    $params[1] = array("param" => ":force", "var" => $currentFL, "type" => PDO::PARAM_INT,);

    $queryResult2 = Database::runQuery('select', $query, $params);
			
    while($row2 = $queryResult2->fetch()) {
        $alienArray[$row['name']][$row2['id']] = $row2['name'];
    }
}

header('Content-Type: application/json');
echo json_encode($alienArray);