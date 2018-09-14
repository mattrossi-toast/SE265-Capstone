<?php 

function pullTemplatesForDropDown(){ 
global $db; 
$sql = "SELECT * FROM templates";
$stmt = $db->prepare($sql);
$stmt->execute();
$templates = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $templates;
}

function getAllTemplates(){
	global $db;
	$sql = "SELECT * from templates";
	$stmt = $db->prepare($sql);
	$stmt->execute();
	$results = $stmt->fetchAll();
	return $results;

}


?>