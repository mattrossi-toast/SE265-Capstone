<?php include_once("charts.php") ?>
<script>
function sendAnswer(index,questionID,number,report){
        var d = new Date();
        var report = {questionId: questionID, report: report, response: number};
        report = JSON.stringify(report);
        $.ajax({
            type: 'POST',
            url: 'models/responses.php',
            data: {report: report},
            success: function(response){
                   
                populateCharts(index, number, d.toLocaleDateString());
                
            },
            error: function(err){
                console.log("err: " + err);
            }
        });
    }

function changeTemplate(templateID){
    alert("ayo");
}


</script>
	<nav  class="signUp row">
	<span class='col-sm-2'> </span>
	<h1  class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
    <select onchange="changeTemplate()" style="color:black;" name="template_id">
    <?php foreach($templateDropDown as $template):?>
       <option value='<?php echo($template['template_id']); ?>'<?php  echo $template_id == $template['template_id'] ? 'selected = "selected "' : ''?>> <?php echo($template['TemplateName']); ?> </option>
    <?php endforeach; ?> 
	</select>
	<input type="submit" value="Change Template" onclick="changeTemplate()" />

	</nav>
<div>
    <div class="tracker-head">
<h1>  <?php echo "It is " . date("l, jS \of F Y"); ?> </h1>
<h4> Your Template: </h4>
    </div>
    <br />
<?php for( $i = 0; $i < 2; $i++){ ?>
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
    <div style="heighT:250PX"></div>
 <?php   } ?>


</div>
