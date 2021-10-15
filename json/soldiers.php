<?

	include_once '/home/joshch9/project/mainInclude.php';
		
	$dbh = openDatabase();
		
	$stmt = $dbh->prepare("SELECT * FROM xcom_soldier ORDER BY last_name");
	
	$stmt = $dbh->prepare("SELECT soldier.first_name, soldier.last_name, soldier.nickname, class.name as class, class.id as classID, rank.name as rank, rank.id as rankID, soldier.id as id, soldier.country as country 
			FROM xcom_soldier as soldier 
				INNER JOIN xcom_class as class ON soldier.class_id = class.id
				INNER JOIN xcom_rank as rank ON soldier.rank_id = rank.id
			ORDER BY soldier.id ASC");
	
	$stmt -> execute();
		
	$soldierArray = [];
		
	while ($row = $stmt->fetch()) {
			
		$soldierArray[$row['id']] = [];
		$soldierArray[$row['id']]['First Name'] = $row['first_name'];
		$soldierArray[$row['id']]['Last Name'] = $row['last_name'];
		$soldierArray[$row['id']]['Nickname'] = $row['nickname'];
		$soldierArray[$row['id']]['Country'] = $row['country'];
		$soldierArray[$row['id']]['Rank'] = $row['rank'];
		$soldierArray[$row['id']]['RankID'] = $row['rankID'];
		$soldierArray[$row['id']]['Class'] = $row['class'];
		$soldierArray[$row['id']]['ClassID'] = $row['classID'];
			
		//$stmt2 = $dbh->prepare('SELECT id, description FROM xcom_objective WHERE mission_type_id = :id');
		//$stmt2->bindParam(':id', $row['id']);
		//$stmt2 -> execute();
			
		//while($row2 = $stmt2->fetch()) {
			//$missionArray[$row['description']][$row2['id']] = $row2['description'];
		//}
			
		//$stmt2 = null;
	}

	header('Content-Type: application/json');
	echo json_encode($soldierArray);
		
	$dbh = null;
	$stmt = null;

?>