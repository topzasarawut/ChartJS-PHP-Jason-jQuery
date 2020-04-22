<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart JS</title>


    <style>
    
        body {
            width: 550px;
            margin: 3rem auto;
        }

        #chart-container {
            width: 100%;
            height: auto;
        }

    </style>


</head>
<body>

    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        $(document).ready(function() {
            showGraph();
        });

        function showGraph(){
            {
                $.post("data.php", function(data) {
                    console.log(data);
                    let name = [];
                    let score = [];

                    for (let i in data) {
                        name.push(data[i].student_name);
                        score.push(data[i].student_score);
                    }

                    let chartdata = {
                        labels: name,
                        datasets: [{
                                label: 'Student Score',
                                backgroundColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#cc65fe',
                        '#ffce56'
                    ],
                    borderColor: [
                        '#ff6384',
                        '#36a2eb',
                        '#cc65fe',
                        '#ffce56'
                    ],
                                
                                data: score
                        }]
                    };

                    let graphTarget = $('#graphCanvas');
                    let barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata
                    })
                })
            }
        }
    </script>

</body>
</html>