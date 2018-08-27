
function drawChart(chartData) {
for(var i = 0; i <= 1; i++){
    var ctx = document.getElementById("myChart" + i).getContext('2d');
    ctx.width = 500;
    ctx.height = 500;
    var myChart = [];
    myChart[i] = new Chart(ctx, {
        type: 'line',

        data: {
            labels: chartData['report']['question' + (i +1)]['date'],
            datasets: [{
                label: 'Rating',
                data: chartData['report']['question'  + (i +1)]['response'],
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


