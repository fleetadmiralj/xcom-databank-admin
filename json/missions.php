<?php

//include_once __DIR__.'/../../project/adminInclude.php';
echo __DIR__.'/../../project/adminInclude.php';

use XCOMDatabank\Utility\Database;

$query = "SELECT * FROM xcom_mission_type WHERE enabled = true ORDER BY description";
$params = array();

$queryResult = Database::runQuery('select', $query, $params);
		
$missionArray = [];
		
while ($row = $queryResult->fetch()) {
			
    $missionArray[$row['description']] = [];

    $query = 'SELECT id, description FROM xcom_objective WHERE mission_type_id = :id AND enabled = true';
    $params[0] = array("param" => ":id", "var" => $row['id'], "type" => PDO::PARAM_INT,);

    $queryResult2 = Database::runQuery('select', $query, $params);
			
    while($row2 = $queryResult2->fetch()) {
        $missionArray[$row['description']][$row2['id']] = $row2['description'];
    }
}

header('Content-Type: application/json');
echo json_encode($missionArray);