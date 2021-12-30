<?php

include_once __DIR__.'/../../project/adminInclude.php';

use XCOMDatabank\Utility\Database;

$query = "SELECT soldier.first_name, soldier.last_name, soldier.nickname, class.name as class, class.id as classID, xrank.name as xrank, xrank.id as rankID, soldier.id as id, soldier.country as country 
			FROM xcom_soldier as soldier 
				INNER JOIN xcom_class as class ON soldier.class_id = class.id
				INNER JOIN xcom_rank as xrank ON soldier.rank_id = xrank.id
			ORDER BY soldier.id";
$params = array();

$queryResult = Database::runQuery('select', $query, $params);
		
$soldierArray = [];
		
while ($row = $queryResult->fetch()) {
			
    $soldierArray[$row['id']] = [];
    $soldierArray[$row['id']]['First Name'] = $row['first_name'];
    $soldierArray[$row['id']]['Last Name'] = $row['last_name'];
    $soldierArray[$row['id']]['Nickname'] = $row['nickname'];
    $soldierArray[$row['id']]['Country'] = $row['country'];
    $soldierArray[$row['id']]['Rank'] = $row['xrank'];
    $soldierArray[$row['id']]['RankID'] = $row['rankID'];
    $soldierArray[$row['id']]['Class'] = $row['class'];
    $soldierArray[$row['id']]['ClassID'] = $row['classID'];
}

	header('Content-Type: application/json');
	echo json_encode($soldierArray);