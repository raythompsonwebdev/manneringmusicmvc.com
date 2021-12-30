<?php
include __DIR__ . '/../includes/DatabaseConnection.php';



if (isset($_POST['songId'])) {

	$songId = $_POST['songId'];
	$sql = "UPDATE `audio` SET `plays` = `plays` + 1 WHERE `id`='$songId'";
	$stmt = $pdo->prepare($sql);
	$stmt->bindValue(':songId', $songId);
	$stmt->execute();
} else {

	echo 'Sorry No Audio Available';
}
