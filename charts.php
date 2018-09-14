<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    <?php
    if($chartData && $chartLabels){
    echo('var responses =' . $chartData  . "; \n");
    echo('var dates =' . $chartLabels  . ";\n");
    }
    else{
    echo('var responses =[];');
    echo('var dates =[];');
    }
    echo('var questions =' . json_encode($questions) . ";");
    echo('var userId =' . $_SESSION['id'] . ";");
    ?>


function populateCharts(index, response, date){
    if(response && date){
        responses[index].push(response);
        dates[index].push(date);
    }   
    if(responses && dates){
        console.log("HEOY! " + responses + dates);
    drawChart(responses, dates);
    }
    else{
        drawChart([],[])
    }
}

function drawChart(chartData, chartLabels) {
for(var i = 0; i <= questions.length - 1; i++){
    var ctx = document.getElementById("myChart" + i).getContext('2d');
    ctx.width = 500;
    ctx.height = 500;
    var myChart = [];
    myChart[i] = new Chart(ctx, {
        type: 'line',

        data: {
            labels:chartLabels[i],
            datasets: [{
                label: 'Progress',
                data: chartData[i],
		backgroundColor: [
		'rgba(211,124,126,1)',

		],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            },
                {
                    label:'',
                    data: [1,5],
		    backgroundColor: [
			'rgba(0,0,0,0)',
			],
                    borderColor: [
                        'rgba(255,99,132,0)',
                    ],
                    borderWidth: 0
                }]
        },
        options: {
            scales: {
                yAxes: [{
                    display:true,
                    ticks: {
                        beginAtZero: false,
                        min:1,
                        Max: 5,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}}
</script>