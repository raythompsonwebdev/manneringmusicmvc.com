<?php

include __DIR__ . '/../includes/DatabaseConnection.php';


if(isset($_POST['songId'])) {
	

	$songId = $_POST['songId'];

		
	//var_dump($songId);
		

	$sql = 'SELECT * FROM audio WHERE audioid = :songId ';
	
	$stmt = $pdo->prepare($sql);

	$stmt->bindValue(':songId', $songId);
	$stmt->execute();
	
	$resultArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

	$array = array();

	foreach($resultArray as $key => $value) {

		array_push($array, $value);
	}
	
	
	echo json_encode($array, JSON_UNESCAPED_SLASHES);

	
}else{
	echo 'weekly bust';
}


?>