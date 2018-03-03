var results = [];

$(document).ready(function() {
    results = JSON.parse(sessionStorage.getItem('results'));
    createReport();
})

function createReport() {
    console.log(results);
    
    var summed = [];

    results.forEach(function (d) {
        if(summed.hasOwnProperty(d.ID)) {
           summed[d.ID] = summed[d.ID] + d.VALUE;
        } 
        else {       
           summed[d.ID] = d.VALUE;
        }
    });

    for(var i = 0; i < summed.length; i++) {
        summed[i] = summed[i] / 5;
    }
    
    console.log(summed);
    
    var ctx = $("#chart");
    
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'polarArea',

        // The data for our dataset
        data: {
            labels: ["Structures and Processes", "Cashflow Efficiency", "Revenue Reliability", "Independency", "Potential for Growth", "Tech-Innovation", "Exchangeability", "Desirability"],
            datasets: [{
                data: summed,
                backgroundColor: ['#000', '#fb4f14', '#008fd5', '#cb6d51', '#90EE90', '#c71585', '#ffd700', '#ee82ee']
            }]
        },

        // Configuration options go here
        options: {
            responsive: true,
            legend: {
                display: false
            },
            scale: {
                ticks: {
                    min: 0,
                    max: 100,
                    beginAtZero: true
                }
            }
        }
    });
}