<?

	include_once '/home/joshch9/project/mainInclude.php';
		
	$dbh = openDatabase();
		
	$stmt = $dbh->prepare("SELECT * FROM xcom_class ORDER BY name");
	$stmt -> execute();
		
	$classArray = [];
		
	while ($row = $stmt->fetch()) {
			
		$classArray[$row['name']] = [];
		$classArray[$row['name']]['id'] = $row['id'];
			
		$stmt2 = $dbh->prepare('SELECT rank.id id, rank.name name, rank.level level FROM xcom_rank rank
			INNER JOIN xcom_class_rank a ON a.rank_id = rank.id			
			INNER JOIN xcom_class class ON a.class_id = class.id 
		WHERE class.id = :id ORDER BY rank.level');
		$stmt2->bindParam(':id', $row['id']);
		$stmt2 -> execute();
			
		while($row2 = $stmt2->fetch()) {
			$classArray[$row['name']]['rank'][$row2['id']] = $row2['name'];
		}
			
		$stmt2 = $dbh->prepare('SELECT skill.id id, skill.name name FROM xcom_skills skill 
			INNER JOIN xcom_class_skill a ON a.skill_id = skill.id 
			INNER JOIN xcom_class class ON a.class_id = class.id 
		WHERE class.id = :id ORDER BY skill.name');
		$stmt2->bindParam(':id', $row['id']);
		$stmt2 -> execute();
			
		$classArray[$row['name']]['skills'] = [];
			
		while($row2 = $stmt2->fetch()) {
			$classArray[$row['name']]['skills'][$row2['id']] = $row2['name'];
		}
			
		$stmt2 = null;
			
	}

	header('Content-Type: application/json');
	echo json_encode($classArray);
		
	$dbh = null;
	$stmt = null;

?>