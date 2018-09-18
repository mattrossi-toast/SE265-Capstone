<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
	<head>
    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link rel="stylesheet" type='text/css' href="styles/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js'></script>
	</head>
	<body>

<?php 
error_reporting(0);
include_once("models/responses.php");
include_once("models/questions.php");
include_once("models/users.php");
include_once("models/templates.php");
include_once("models/reports.php");
include_once("db.php");

$email =  $_POST['Email'];
if(!$_SESSION['Email']){
$_SESSION['Email'] = $email;
}
$pw = $_POST['PW'];
$action = $_REQUEST['action'];
$emailConf = $_POST['EmailConf'];
$pwConf = $_POST['PWConf'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$bDay = $_POST['birthday'];
$reportId = $_POST['report'];
$questionId = $_POST['question'];
$responseId = $_POST['response'];
$errorString = '';

switch($action){
    case 'Login':
    $hash = grabHash($_SESSION["Email"]);
    $userId= grabUserId($email);
    if(!$_SESSION['isAdmin']){
    $_SESSION['isAdmin'] = getAdminStatus($userId);
    }
    if(!$_SESSION['id']){
    $_SESSION['id'] = $userId;
    }

    if(!$_SESSION['templateId']){
    $_SESSION['templateId'] = grabTemplateId($email);
    }
    $questions = getQuestions($_SESSION['templateId']);
    $reportId = getReportData($_SESSION['id'], $_SESSION['templateId']);
    $responses = getResponsesByReportId($reportId);
    $dates = getDatesByReportId($reportId, $questionId);
    for($i=0; $i < sizeof($questions); $i++){
        $response[$i] = [];
        $response[$i] = getResponsesByQuestionId($questions[$i]['QuestionID'], $reportId);
        for($j=0; $j < sizeof($response[$i]); $j++){
        $response[$i][$j] = $response[$i][$j]["Response"];
    }
    }
    for($i=0; $i < sizeof($questions); $i++){
        $date[$i] = getDatesByQuestionId($questions[$i]['QuestionID'], $reportId);
        for($j=0; $j < sizeof($date[$i]); $j++){
        $date[$i][$j] = $date[$i][$j]["Date"];
        }
    }
    $chartData=json_encode($response);
    $chartLabels=json_encode($date);
    include_once("charts.php");
   if(password_verify($pw, $hash)){
    $templateDropDown = pullTemplatesForDropDown();
    include_once('views/tracker.php');
    }
    elseif($_SESSION['id']){
        $templateDropDown = pullTemplatesForDropDown();
        include_once('views/tracker.php');
    }
    else{
        include_once('views/userLogin.php');
    }
    break;

    case 'Register':
    
    if(confirm($pw, $pwConf) && emailNotExists($email)){
    $hash = password_hash($pw, PASSWORD_DEFAULT);
    addUser($email, $hash, $fName, $lName, $bDay);
    $successString = 'Successfully Registered! Please log in to continue';
    }

   if(!confirm($pw,$pwConf)){
        $errorString .= "<br/> Password must match confirmation";   
    }

    if(emailNotExists($email)){
        $errorString .= "<br/> Email already registered.";   
    }
    include_once('views/userLogin.php');
    break;

    case 'User':
    $user = getUserData($_SESSION['id']);
    include_once('views/shared/userEdit.php');
    break;

    case 'Edit':
    if($_GET['userId']){
        $user = getUserData($_GET['userId']);
        $adminPage = true;
        include_once('views/shared/userEdit.php');

    }
    if($_GET['templateId']){
        $questions = getQuestions($_GET['templateId']);
        $adminPage = true;
        include_once('views/admin/adminTemplate.php');

    }
    break;
    
    case 'Logout':
    session_destroy();
    include_once('views/userLogin.php');
    break;

    case 'Admin':
    include_once("models/users.php");
    $users = getAllUsers();
    $templates = getAllTemplates();
    $adminPage = true;
    include_once('views/admin/adminMain.php');
    break;

    case 'Update Template':
    $_SESSION['templateId'] = $_POST['template_id'];
    changeUserTemplate($_SESSION['id'], $_SESSION['templateId']);
    $questions = getQuestions($_SESSION['templateId']);
    $reportId = getReportData($_SESSION['id'], $_SESSION['templateId']);
    if(!$reportId){
        addReport($_SESSION['templateId'], $_SESSION['id']);
    }
    $responses = getResponsesByReportId($reportId);
    $dates = getDatesByReportId($reportId, $questionId);
    for($i=0; $i < sizeof($questions); $i++){
        $response[$i] = [];
        $response[$i] = getResponsesByQuestionId($questions[$i]['QuestionID'], $reportId);
        for($j=0; $j < sizeof($response[$i]); $j++){
        $response[$i][$j] = $response[$i][$j]["Response"];
    }
    }
    for($i=0; $i < sizeof($questions); $i++){
        $date[$i] = getDatesByQuestionId($questions[$i]['QuestionID'], $reportId);
        for($j=0; $j < sizeof($date[$i]); $j++){
        $date[$i][$j] = $date[$i][$j]["Date"];
        }
    }
    $chartData=json_encode($response);
    $chartLabels=json_encode($date);
    include("charts.php");

    $templateDropDown = pullTemplatesForDropDown();
    include_once('views/tracker.php');
    break;

    case 'Delete':
        if($_GET['userId']){
            $userReports = getReportsByUserId($_GET['userId']);

            foreach($userReports as $report){
            deleteResponsesByUserId($report["ReportID"]);
            }
            deleteReportsByUserId($_GET['userId']);
            deleteUserById($_GET['userId']);
        }
        $users = getAllUsers();
        $templates = getAllTemplates();
        $adminPage = true;
        include_once('views/admin/adminMain.php');
    break;
    case 'Home':
    if(!$adminPage){
    var_dump($_SESSION['templateId'], $_SESSION['id']);
    changeUserTemplate($_SESSION['id'], $_SESSION['templateId']);
    $questions = getQuestions($_SESSION['templateId']);
    $reportId = getReportData($_SESSION['id'], $_SESSION['templateId']);
    $isAdmin = getAdminStatus($_SESSION['id']);
    
    if(is_null($reportId)){
        
        addReport($_SESSION['templateId'], $_SESSION['id']);
    }
    $responses = getResponsesByReportId($reportId);
    $dates = getDatesByReportId($reportId, $questionId);
    for($i=0; $i < sizeof($questions); $i++){
        $response[$i] = [];
        $response[$i] = getResponsesByQuestionId($questions[$i]['QuestionID'], $reportId);
        for($j=0; $j < sizeof($response[$i]); $j++){
        $response[$i][$j] = $response[$i][$j]["Response"];
    }
    }
    for($i=0; $i < sizeof($questions); $i++){
        $date[$i] = getDatesByQuestionId($questions[$i]['QuestionID'], $reportId);
        for($j=0; $j < sizeof($date[$i]); $j++){
        $date[$i][$j] = $date[$i][$j]["Date"];
        }
    }
    $chartData=json_encode($response);
    $chartLabels=json_encode($date);
    include("charts.php");

    $templateDropDown = pullTemplatesForDropDown();
    include_once('views/tracker.php');
    }
    if($adminPage){
        include_once("models/users.php");
        $users = getAllUsers();
        $templates = getAllTemplates();
        include_once('views/admin/adminMain.php');
    }
    break;

    
    case '':
    include_once('views/userLogin.php');
    break;

}
?>
</body>
</html>