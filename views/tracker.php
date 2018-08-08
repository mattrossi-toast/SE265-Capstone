
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
            <div onclick="sendAnswer(1)" class="answer answer-one col-lg-2 col-md-2 col-sm-2">
            1
            </div>
            <div onclick="sendAnswer(2)" class="answer answer-two col-lg-2 col-md-2 col-sm-2">
            2
            </div>
            <div onclick="sendAnswer(3)"class="answer answer-three col-lg-2 col-md-2 col-sm-2">
            </div>
            <div onclick="sendAnswer(4)" class="answer answer-four col-lg-2 col-md-2 col-sm-2">
            </div>
            <div onclick="sendAnswer(5)"class="answer answer-five col-lg-2 col-md-2 col-sm-2">
            </div>
    </div>
    </div>
 <?php   } ?>
 <script>

 </script>

</div>
