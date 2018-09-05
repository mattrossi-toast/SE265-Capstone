<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    <?php
    echo('var responses =' . $chartData . "; \n");
    echo('var dates =' . $chartLabels . "; \n");
    echo('var questions =' . json_encode($questions) . ";");
    ?>
$(document).ready(function(){
    
    populateCharts();
    
});

function populateCharts(index, response, date){
    if(response && date){
        console.log("yay" +" "+ responses +" "+ dates)
        responses[index].push(response);
        dates[index].push(date);
    }
    console.log("Questions: " + JSON.stringify(questions));
    drawChart(responses, dates);
}

function drawChart(chartData, chartLabels) {
    console.log(chartData[questions[0]["QuestionID"]]);
for(var i = 0; i <= 1; i++){
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