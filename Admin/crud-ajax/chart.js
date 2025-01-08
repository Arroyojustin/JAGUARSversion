// Render the bar chart using ApexCharts
const options = {
    chart: {
        type: 'bar',
        height: 300
    },
    series: [{
        name: 'Users',
        data: [
            userCounts.admin, 
            userCounts.coordinator, 
            userCounts.coach, 
            userCounts.student
        ]
    }],
    xaxis: {
        categories: ['Admin', 'Coordinator', 'Coach', 'Student']
    },
    colors: ['#1E90FF', '#FFD700', '#32CD32', '#9370DB'], // Optional: Custom bar colors
    title: {
        text: 'User Distribution',
        align: 'center',
        style: {
            fontSize: '16px'
        }
    }
};

// Initialize and render the chart
const chart = new ApexCharts(document.querySelector("#users-chart"), options);
chart.render();
