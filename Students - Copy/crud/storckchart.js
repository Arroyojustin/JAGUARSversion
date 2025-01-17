$(document).ready(function () {
    // Function to initialize the chart
    function renderChart(value) {
      var options = {
        series: [value], // Dynamic value from AJAX
        chart: {
          height: 350,
          type: "radialBar",
          offsetY: -10,
        },
        plotOptions: {
          radialBar: {
            startAngle: -135,
            endAngle: 135,
            dataLabels: {
              name: {
                fontSize: "16px",
                offsetY: 120,
              },
              value: {
                offsetY: 76,
                fontSize: "22px",
                formatter: function (val) {
                  return val + "%";
                },
              },
            },
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            shade: "dark",
            shadeIntensity: 0.15,
            inverseColors: false,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 50, 65, 91],
          },
        },
        stroke: {
          dashArray: 4, // Stroked effect
        },
        labels: [""],
      };
  
      // Render the chart
      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    }
  
    // AJAX request to fetch the value
    $.ajax({
      url: "https://api.example.com/get-ratio", // Replace with your API endpoint
      method: "GET",
      success: function (response) {
        // Assume the API returns a JSON object like { ratio: 67 }
        renderChart(response.ratio);
      },
      error: function () {
        console.error("Failed to fetch data");
        renderChart(0); // Fallback value
      },
    });
  });
  