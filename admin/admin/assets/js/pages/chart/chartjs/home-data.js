
$(document).ready(function() {
load_dashbordcharts();
function load_dashbordcharts(){
  var action = "load-charts";
  $.ajax({
            url:'../queries/dashboard-queries.php',
            method:"POST",
            data:{action:action},
            success:function(data){ 
            data = JSON.parse(data);
    var config = {
        type: 'pie',
    data: {
        datasets: [{
            data:data[0],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
                // window.chartColors.blue,
            ],
            backgroundColor: [
                window.chartColors.red,
                window.chartColors.orange,
                window.chartColors.yellow,
                window.chartColors.green,
                // window.chartColors.blue,
            ],
            label: 'Dataset 1'
        }],
        labels: [
            "Withdrawn",
            "On Probation",
            "Transferred",
            "Active"
            // "Blue"
        ]
    },
    options: {
        responsive: true
    }
};

    var ctx = document.getElementById("chartjs_pie").getContext("2d");
    window.myPie = new Chart(ctx, config);


var color = Chart.helpers.color;
    var barChartData = {
        labels: data[1],
        datasets: [{
            type: 'bar',
            label: 'First Class (4.50 >)',
            backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
            borderColor: window.chartColors.red,
            data:data[2][0]
        }, {
            type: 'line',
            label: '2nd Class U.D (>3.50 <4.49 )',
            backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
            borderColor: window.chartColors.blue,
            data:data[2][1]
        }, {
            type: 'line',
            label: '2nd Class L.D (>2.40 < 3.50 )',
            backgroundColor: color(window.chartColors.blue).alpha(0.2).rgbString(),
            borderColor: window.chartColors.blue,
            data:data[2][2]
        },  {
            type: 'bar',
            label: '3rd Class (<3.49)',
            backgroundColor: color(window.chartColors.green).alpha(0.2).rgbString(),
            borderColor: window.chartColors.green,
            data:data[2][3]
        }]
    };

        var ctx = document.getElementById("canvas1").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: 'Student Grade Survey'
                },
            }
        });

}
});
}
});