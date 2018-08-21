

<?php

$report = $_POST['report'];
if(isset($_POST['report'])){
    var_dump("report" . $report);
    file_put_contents("../reports/1.json", $report);

}



function getReportData($userId){

$data = file_get_contents("../reports/" . $userId . ".json");
    $json = json_decode($data, true);

    return($json);
}


if($report){
    var_dump($report);
}


 //   $json = json_encode($report);
 //   echo $report;

?>

