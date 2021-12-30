<?php

include_once __DIR__.'/../../project/adminInclude.php';

use XCOMDatabank\Utility\Database;

$query = "SELECT * FROM xcom_class WHERE enabled = true ORDER BY name";
$params = array();

$queryResult = Database::runQuery('select', $query, $params);
		
$classArray = [];
		
while ($row = $queryResult->fetch()) {
			
    $classArray[$row['name']] = [];
    $classArray[$row['name']]['id'] = $row['id'];

    $query = 'SELECT xrank.id as id, xrank.name as name, xrank.level as level FROM xcom_rank xrank
			INNER JOIN xcom_class_rank a ON a.rank_id = xrank.id			
			INNER JOIN xcom_class class ON a.class_id = class.id 
		WHERE class.id = :id and xrank.enabled = true ORDER BY xrank.level';
    $params[0] = array("param" => ":id", "var" => $row['id'], "type" => PDO::PARAM_INT,);

    $queryResult2 = Database::runQuery('select', $query, $params);
			
    while($row2 = $queryResult2->fetch()) {
        $classArray[$row['name']]['rank'][$row2['id']] = $row2['name'];
    }

    $query = 'SELECT skill.id as id, skill.name as name FROM xcom_skills as skill 
			INNER JOIN xcom_class_skill a ON a.skill_id = skill.id 
			INNER JOIN xcom_class class ON a.class_id = class.id 
		WHERE class.id = :id and skill.enabled = true ORDER BY skill.name';
    $params[0] = array("param" => ":id", "var" => $row['id'], "type" => PDO::PARAM_INT,);

    $queryResult2 = Database::runQuery('select', $query, $params);
			
    $classArray[$row['name']]['skills'] = [];
			
    while($row2 = $queryResult2->fetch()) {
        $classArray[$row['name']]['skills'][$row2['id']] = $row2['name'];
    }
}

header('Content-Type: application/json');
echo json_encode($classArray);