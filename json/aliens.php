<?
	include_once '/home/joshch9/project/mainInclude.php';

	//function createAlienJson() {
		
		$dbh = openDatabase();
		
		$stmt = $dbh->prepare("SELECT * FROM xcom_alien_type ORDER BY faction ASC, name ASC");
		$stmt -> execute();
		
		$alienArray = [];
		
		while ($row = $stmt->fetch()) {
			
			$alienArray[$row['name']] = [];
			
			$stmt2 = $dbh->prepare('SELECT id, name FROM xcom_aliens WHERE type_id = "'.$row['id'].'"');
			$stmt2 -> execute();
			
			while($row2 = $stmt2->fetch()) {
				$alienArray[$row['name']][$row2['id']] = $row2['name'];
				//array_push($alienArray[$row['name']], $row2['name']);
			}
			
			
			$stmt2 = null;
			
		}

		//$response = array();
		//$posts = array();
		//$result=mysql_query($sql);
		//while($row=mysql_fetch_array($result)) { 
		  //$title=$row['title']; 
		  //$url=$row['url']; 

		  //$posts[] = array('title'=> $title, 'url'=> $url);
		//} 

		//$response['posts'] = $posts;
		header('Content-Type: application/json');
		echo json_encode($alienArray);
		
		//$fp = fopen('/home/joshch9/xcom-databank/admin/json-test/aliens.json', 'w');
		//fwrite($fp, json_encode($alienArray));
		//fclose($fp);
		
		$dbh = null;
		$stmt = null;
		
	//}

?>