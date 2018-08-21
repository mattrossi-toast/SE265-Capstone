
<script>

    var report;
    $(document).ready(
        function() {
            fetch('reports/1.json')
                .then(function (response) {
                    console.log(response);
                    return response.json();
                })
                .then(function (myJson) {
                    report = myJson;
                    console.log(report);
                    drawChart(report['report']);
                });
        });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div>
    <div class="tracker-head">
<h1>  <?php echo "It is " . date("l, jS \of F Y"); ?> </h1>
<h4> Your Template: </h4>
    </div>
    <br />


<?php for( $i = 0; $i < 2; $i++){ ?>
    <div class="goal-template">
    <div class="chart">
     <canvas id='<?php echo "myChart" . $i; ?>'height="10" width="10"></canvas>
     </div>
        <div class="question-container row">
        <h4>Question Text</h4>
            <div onclick="sendAnswer(<?php echo $i + 1?>,1, report)" class="answer answer-one col-lg-2 col-md-2 col-sm-2">
            1
            </div>
            <div onclick="sendAnswer(<?php echo $i + 1?>,2, report)" class="answer answer-two col-lg-2 col-md-2 col-sm-2">
            2
            </div>
            <div onclick="sendAnswer(<?php echo $i + 1?>,3, report)"class="answer answer-three col-lg-2 col-md-2 col-sm-2">
            </div>
            <div onclick="sendAnswer(<?php echo $i + 1?>,4, report)" class="answer answer-four col-lg-2 col-md-2 col-sm-2">
            </div>
            <div onclick="sendAnswer(<?php echo $i + 1?>,5, report)"class="answer answer-five col-lg-2 col-md-2 col-sm-2">
            </div>
    </div>
    </div>
 <?php   } ?>


</div>



<script>

    function sendAnswer(questionID,number,report){

        console.log("HERE" + report);
        console.log(number);
        var d = new Date();

        report['report']['question' + questionID]['response'].push(number);
        report['report']['question' + questionID]['date'].push(d.toLocaleDateString());
        drawChart(report['report']);

        $.ajax({
            type: "GET",
            url: "models/reports.php",
            data: {"report": report},
            success: function(data){
                console.log("success: " + data);
            },
            error: function(err){
                console.log("err: " + err);
            }
        });
        //$(".answer").addClass("answer-disabled");
    }

</script>
