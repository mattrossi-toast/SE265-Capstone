

<?php
function getReportData($userId){

$data = file_get_contents("reports/" . $userId . ".json");
    $json = json_decode($data, true);

    return($json);

}


if(!is_null($_GET)){
    var_dump($_GET['report']);
}

 //   $json = json_encode($report);
 //   echo $report;

?>

