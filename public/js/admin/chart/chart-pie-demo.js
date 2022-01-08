// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
async function getPieChart() {
  var ctx = document.getElementById("myPieChart");
  var data_view_url = ctx.getAttribute('data-url');
  await axios.get(data_view_url).then(function (response) {
    var arr_label = [];
    var arr_data = [];
    Object.values(response.data).map(res => {
      arr_label.push(res.name);
      arr_data.push(res.percent)
    })
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: arr_label,
        datasets: [{
          data: arr_data,
          backgroundColor: ['#e74a3b','#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
          hoverBackgroundColor: ['#ff0000','#2e59d9', '#17a673', '#2c9faf', '#f2b418'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  })
    .catch(function (error) {
      console.log(error)
    });
}
getPieChart();