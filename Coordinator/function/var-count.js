document.addEventListener("DOMContentLoaded", function () {
    // Fetch varsity and approved counts from the server
    $.ajax({
      url: "controller/var-count.php", // Path to your PHP script
      method: "GET",
      dataType: "json",
      success: function (response) {
        const varsityCount = response.varsity_count || 0;
        const approvedCount = response.approved_count || 0;
  
        // Chart options
        const options = {
          series: [varsityCount, approvedCount], // Varsity and Approved counts
          chart: {
            height: 390,
            type: "radialBar",
          },
          plotOptions: {
            radialBar: {
              offsetY: 0,
              startAngle: 0,
              endAngle: 270,
              hollow: {
                margin: 5,
                size: "30%",
                background: "transparent",
              },
              dataLabels: {
                name: {
                  show: false,
                },
                value: {
                  show: false,
                },
              },
            },
          },
          colors: ["#1ab7ea", "#39539E"], // Colors for Varsity and Approved
          labels: ["Varsity", "Approved"], // Varsity and Approved labels
          legend: {
            show: true,
            floating: true,
            fontSize: "16px",
            position: "left",
            offsetX: 50,
            offsetY: 10,
            labels: {
              useSeriesColors: true,
            },
            formatter: function (seriesName, opts) {
              return seriesName + ": " + opts.w.globals.series[opts.seriesIndex];
            },
            itemMargin: {
              horizontal: 3,
            },
          },
          responsive: [
            {
              breakpoint: 480, // Mobile view
              options: {
                chart: {
                  height: 250, // Adjust chart height for smaller screens
                },
                legend: {
                  fontSize: "12px", // Smaller legend text
                  position: "bottom", // Move legend to the bottom
                  offsetX: 0,
                  offsetY: 10,
                },
              },
            },
          ],
        };
  
        // Render the chart
        const chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      },
      error: function (error) {
        console.error("Error fetching user counts:", error);
      },
    });
  });
  