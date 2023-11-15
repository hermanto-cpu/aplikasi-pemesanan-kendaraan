// /* globals Chart:false */

// (() => {
//   'use strict'

//   // Graphs
//   const ctx = document.getElementById('myChart')
//   // eslint-disable-next-line no-unused-vars
//   const myChart = new Chart(ctx, {
//     type: 'line',
//     data: {
//       labels: [
//         'Sunday',
//         'Monday',
//         'Tuesday',
//         'Wednesday',
//         'Thursday',
//         'Friday',
//         'Saturday'
//       ],
//       datasets: [{
//         data: [
//           15339,
//           21345,
//           18483,
//           24003,
//           23489,
//           24092,
//           12034
//         ],
//         lineTension: 0,
//         backgroundColor: 'transparent',
//         borderColor: '#007bff',
//         borderWidth: 4,
//         pointBackgroundColor: '#007bff'
//       }]
//     },
//     options: {
//       plugins: {
//         legend: {
//           display: false
//         },
//         tooltip: {
//           boxPadding: 3
//         }
//       }
//     }
//   })
// })()

(() => {
    "use strict";

    const ctx = document.getElementById("myChart");
    const chartData = JSON.parse(ctx.getAttribute("data-chart"));

    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: chartData.labels,
            datasets: [
                {
                    data: chartData.datasets[0].data,
                    backgroundColor: chartData.datasets[0].backgroundColor,
                },
            ],
        },
        options: {
            plugins: {
                legend: {
                    display: false,
                },
                tooltip: {
                    boxPadding: 3,
                },
            },
            scales: {
                x: {
                    ticks: {
                        reverse: true,
                    },
                },
            },
            barThickness: 100,
        },
    });
})();
