<?

	include_once '/home/joshch9/project/mainInclude.php';
		
	$dbh = openDatabase();
		
	$stmt = $dbh->prepare("SELECT * FROM xcom_mission_type ORDER BY description");
	$stmt -> execute();
		
	$missionArray = [];
		
	while ($row = $stmt->fetch()) {
			
		$missionArray[$row['description']] = [];
			
		$stmt2 = $dbh->prepare('SELECT id, description FROM xcom_objective WHERE mission_type_id = :id');
		$stmt2->bindParam(':id', $row['id']);
		$stmt2 -> execute();
			
		while($row2 = $stmt2->fetch()) {
			$missionArray[$row['description']][$row2['id']] = $row2['description'];
		}
			
		$stmt2 = null;
	}

	header('Content-Type: application/json');
	echo json_encode($missionArray);
		
	$dbh = null;
	$stmt = null;

?>