<?php

include_once __DIR__.'/../../project/adminInclude.php';

use XCOMDatabank\Utility\Database;

$query = "SELECT * FROM xcom_covert_type WHERE enabled = true ORDER BY name";
$params = array();

$queryResult = Database::runQuery('select', $query, $params);
		
$covertArray = [];

while ($row = $queryResult->fetch()) {
    $covertArray[$row['name']] = [];
}
	
header('Content-Type: application/json');
echo json_encode($covertArray);