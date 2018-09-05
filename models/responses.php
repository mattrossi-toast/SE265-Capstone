<?php
include "../db.php";

function jsonifyData($item){
    $preserveSubArrays = false;
    $temp = [];
    foreach($item as $key => $value) {
        $groupValue = $value["QuestionID"];
        unset($item[$key]["QuestionID"]);
        if(!array_key_exists($groupValue, $temp)) {
            $temp[$groupValue] = array();
        }

        if(!$preserveSubArrays){
            $data = count($item[$key]) == 1? array_pop($item[$key]) : $item[$key];
        } else {
            $data = $item[$key];
        }
        $temp[$groupValue][] = $data;
    }
        return $temp[$groupValue];
}

function getResponsesByReportId($reportId){
   
    global $db;
    $sql = "SELECT QuestionID, Response FROM responses WHERE ReportID = :reportId ORDER BY ResponseID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':reportId', $reportId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;


}

function getResponsesByQuestionId($questionId, $reportId){
   
    global $db;
    $sql = "SELECT Response FROM responses WHERE QuestionID = :questionId AND ReportID = :reportId";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':questionId', $questionId);
    $stmt->bindParam(':reportId', $reportId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;


}

function getDatesByReportId($reportId){
   
    global $db;
    $sql = "SELECT QuestionID, Date FROM responses WHERE ReportID = :reportId ORDER BY ResponseID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':reportId', $reportId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;


}

function getDatesByQuestionId($questionId, $reportId){
   
    global $db;
    $sql = "SELECT Date FROM responses WHERE ReportID = :reportId AND QuestionID = :questionId ORDER BY ResponseID";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':reportId', $reportId);
    $stmt->bindParam(':questionId', $questionId);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $results;


}

function updateResponseByReportId($reportId, $questionId, $response){
   
    global $db;
    $sql = "INSERT INTO responses (ReportID, QuestionID, Response, Date) VALUES (:reportId, :questionId, :response, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':reportId', $reportId);
    $stmt->bindParam(':questionId', $questionId);
    $stmt->bindParam(':response', $response);
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

global $db;
if($_POST['report']){
    $report = json_decode($_POST['report'], true);
    $question = $report['questionId'];
    $response = $report['response'];
    $reportId = $report['report'];
    updateResponseByReportId($reportId, $question, $response);
    $responses = getResponsesByReportId($reportId);
    $dates = getDatesByReportId($reportId);

    return $responses;
}
?>