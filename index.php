<?php error_reporting(0);
require "models/users.php";
$email =  $_POST['Email'];
$pw = $_POST['PW'];
$action = $_REQUEST['action'];
$emailConf = $_POST['EmailConf'];
$pwConf = $_POST['PWConf'];
$fName = $_POST['fName'];
$lName = $_POST['lName'];
$bDay = $_POST['birthday'];
$errorString = '';
switch($action){
    case 'Login':
    $hash = grabHash($email);
    var_dump($hash);
    var_dump(password_hash($pw, PASSWORD_DEFAULT));
    if(password_verify($pw, $hash)){
    include_once('views/tracker.php');
    }
    break;

    case 'Register':
    
    if(confirm($email, $emailConf) && confirm($pw, $pwConf) && emailNotExists($email)){
    $hash = password_hash($pw, PASSWORD_DEFAULT);
    addUser($email, $hash, $fName, $lName, $bDay);
    include_once('views/tracker.php');
    }
    if(!confirm($email,$emailConf)){
        
        $errorString .= "Email must match confirmation";
    }

   if(!confirm($pw,$pwConf)){
        $errorString .= "<br/> Password must match confirmation";   
    }

    if(emailNotExists($email) == false){
        $errorString .= "<br/> Email already registered.";   
    }
    echo("hey");
    include_once('views/userLogin.php');
    
    break;

    case '':
    include_once('views/userLogin.php');
    break;

}
?>
