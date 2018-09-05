<?php 

function pullTemplatesForDropDown(){ 
global $db; 
$sql = "SELECT * FROM templates";
$stmt = $db->prepare($sql);
$stmt->execute();
$templates = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $templates;
}
?>