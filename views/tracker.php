<?php
include_once("charts.php") 
?>
<script>

$(document).ready(function(){
    populateCharts();
    
    
});


function sendAnswer(index,questionID,number,report){
        var d = new Date();
        var report = {questionId: questionID, report: report, response: number};
        report = JSON.stringify(report);
        $.ajax({
            type: 'POST',
            url: 'models/responses.php',
            data: {report: report},
            success: function(response){ 
                console.log(response);          
                populateCharts(index, number, d.toLocaleDateString());    
            },
            error: function(err){
                console.log("err: " + err);
            }
        });
    }

function changeTemplate(){
   template_id = $('#dropDownId').val();
   $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {template_id: template_id},
            success: function(response){
            },
            error: function(err){
                console.log("err: " + err);
            }
        });

        
}


</script>
	<nav  class="signUp row">
	<span class='col-sm-2'> </span>
	<h1  class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
    <form method="POST" action="index.php" name="change">
    <select id="dropDownId" onchange="change.submit();" style="color:black;" name="template_id">
    <?php foreach($templateDropDown as $template):?>
       <option value='<?php echo($template["TemplateID"]); ?>'<?php  echo $_SESSION['templateId'] == $template['TemplateID'] ? 'selected = "selected "' : ''?>> <?php echo($template['TemplateName']); ?> </option>
    <?php endforeach; ?> 
	</select>
    <input type="hidden" name='action' value='Update Template'> </input>
    </form>
    <form action="index.php" method="POST">
    <button name='action' value='User'> My Account </button>
    <button name='action' value='Logout'> Logout </button>
    <?php if($isAdmin == 1){ ?>
        <button name='action' value='Admin'> Admin Portal </button>
      <?php } ?>
    </form>
	</nav>
<div>
    <div class="tracker-head">
<h1>  <?php echo "It is " . date("l, jS \of F Y"); ?> </h1>
<h4> Your Template: </h4>
    </div>
    <br />
<?php for( $i = 0; $i <= count($questions) - 1; $i++){ ?>
    <div class="chart">
     <canvas id='<?php echo "myChart" . $i; ?>'height="10" width="10"></canvas>
     </div>
        <div class="question-container row">
        <h4><?php echo($questions[$i]['QuestionText']);?></h4>
            <div onclick="sendAnswer(<?php echo($i . "," . $questions[$i]['QuestionID'])?>,1, <?php echo $reportId ?>)" class="answer answer-one col-lg-2 col-md-2 col-sm-2">
            1
            </div>
            <div onclick="sendAnswer(<?php echo($i . "," . $questions[$i]['QuestionID'])?>,2,  <?php echo $reportId ?>)" class="answer answer-two col-lg-2 col-md-2 col-sm-2">
            2
            </div>
            <div onclick="sendAnswer(<?php echo($i . "," . $questions[$i]['QuestionID'])?>,3,  <?php echo $reportId ?>)"class="answer answer-three col-lg-2 col-md-2 col-sm-2">
            </div>
            <div onclick="sendAnswer(<?php echo($i . "," . $questions[$i]['QuestionID'])?>,4,  <?php echo $reportId ?>)" class="answer answer-four col-lg-2 col-md-2 col-sm-2">
            </div>
            <div onclick="sendAnswer(<?php echo($i . "," . $questions[$i]['QuestionID'])?>,5, <?php echo $reportId ?>)"class="answer answer-five col-lg-2 col-md-2 col-sm-2">
            </div>
    </div>
    <div style="height:250px"></div>
 <?php   } ?>


</div>
