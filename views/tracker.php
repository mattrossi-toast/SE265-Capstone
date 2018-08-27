
<!DOCTYPE HTML>
<html>
	<head>
    <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
        <link rel="stylesheet" type='text/css' href="styles/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js'></script>
        <script src='charts.js'></script>
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
                        console.log(myJson);
                        drawChart(report);
                });
        });
</script>
	</head>
	<body>
	<nav  class="signUp row">
	<span class='col-sm-2'> </span>
	<h1  class="col-sm-3 "> Step By Step </h1>
	<span class='col-sm-2'> </span>
	<div class="yo col-sm-4" >
	<form action="index.php" method="post">
				<label> Email </label>
				<input type="text" name="Email" value="" > </input>
				<label> Password </label>
				<input type="password" name="PW" value="" > </input>
				
				<input type="submit" name="action" value="Login"> </input>
			</form>
			<a style="margin-left:300px;" data-toggle="modal" data-target="#myModal">Forgot Password?</a>
	</div>
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
 <?php   } ?>


</div>
</body>


<script>

    function sendAnswer(questionID,number,report){
        console.log("HERE" + report);
        console.log(number);
        var d = new Date();

        report['report']['question' + questionID]['response'].push(number);
        report['report']['question' + questionID]['date'].push(d.toLocaleDateString());
        drawChart(report);
        report = JSON.stringify(report);
        $.ajax({
            type: 'POST',
            url: 'models/reports.php',
            data: {report: report},
            success: function(response){
                console.log("success: " + response + " Data: " + report.question1);
            },
            error: function(err){
                console.log("err: " + err);
            }
        });
};

        //$(".answer").addClass("answer-disabled");
</script>
</html>