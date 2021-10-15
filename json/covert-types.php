<?

	include_once '/home/joshch9/project/mainInclude.php';
		
	$dbh = openDatabase();
		
	$stmt = $dbh->prepare("SELECT * FROM xcom_covert_type ORDER BY name ASC");
	$stmt -> execute();
		
	$covertArray = [];
		
	while ($row = $stmt->fetch()) {	
		$covertArray[$row['name']] = [];
	}
	
	header('Content-Type: application/json');
	echo json_encode($covertArray);
		
	$dbh = null;
	$stmt = null;

?>