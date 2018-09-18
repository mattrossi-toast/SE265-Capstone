<?php
include("db.php");
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

function addReport($templateId, $userId){
   
    global $db;
    $sql = "INSERT INTO reports (ReportID, TemplateID, UserID) VALUES (Null, :templateId, :userId)";
    var_dump("hey " .$userId . " " . $templateId);
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->bindParam(':templateId', $templateId);
    $stmt->execute();
}

function deleteReportsByUserId($userId){
    global $db;
    $sql = "DELETE FROM reports WHERE UserID = :userId ";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();


}

function getReportsByUserId($userId){
    global $db;
    $sql = "SELECT ReportID FROM reports WHERE UserID = :userId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':userId', $userId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;

}
?>

