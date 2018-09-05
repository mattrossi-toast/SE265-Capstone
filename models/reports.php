<?php
include "db.php";
function getReportData($userId, $templateId){
    global $db;
    $sql = "SELECT ReportID FROM reports WHERE UserID = :userId AND TemplateID = :templateId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':templateId', $templateId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results[0]["ReportID"];
}
?>

