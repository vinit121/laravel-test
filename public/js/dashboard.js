let mrrChart; // Declare mrrChart globally

document.addEventListener("DOMContentLoaded", function() {
    initDatePicker();
    initChart();
    initDaysSelect();
});

function initDatePicker() {
    const datepicker = document.getElementById("datepicker");
    flatpickr(datepicker, {
        dateFormat: "M d, Y",
        allowInput: true,
        defaultDate: "2024-01-02"
    });

    datepicker.value = flatpickr.parseDate("2024-01-02", "Y-m-d").toLocaleDateString("en-US", {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
}

function getChartData(days) {
    
    const labels = days === 10 ? 
        ['11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan'] :
        ['1 Jan', '2 Jan', '3 Jan', '4 Jan', '5 Jan', '6 Jan', '7 Jan', '8 Jan', '9 Jan', '10 Jan', '11 Jan', '12 Jan', '13 Jan', '14 Jan', '15 Jan', '16 Jan', '17 Jan', '18 Jan', '19 Jan', '20 Jan'];

    return {
        labels: labels,
        datasets: [
            createDataset('Total MRR',0,'#F24A4A'),
            createDataset('New MRR', days, '#5B68F1', [2000, 2100, 2200, 2300, 2400, 2500, 2600, 2700, 2800, 2900]),
            createDataset('Reactivations', days, '#5DD8FF', [1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2000]),
            createDataset('Upgrades', days, '#4AF26F', [1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2200]),
            createDataset('Existing', days, '#6C79FF', [1400, 1500, 1600, 1700, 1800, 1900, 2000, 2100, 2200, 2200]),
            createDataset('Downgrades', days, '#BB87FC', [1100, 1200, 1300, 1400, 1500, 1600, 1700, 1800, 1900, 2100]),
            createDataset('Churn', days, '#FF64D4', [500, 550, 600, 650, 700, 750, 800, 850, 900, 950])
        ]
    };
}

function createDataset(label, days, color, data) {
    return {
        label: label,
        data: days === 10 ? data : data?.concat(data?.slice(0, 10)),
        backgroundColor: color,
        barThickness: 26,
        stack: 'combined'
    };
}

function initChart() {
    const ctx = document.getElementById('mrrChart').getContext('2d');
    const chartData = getChartData(10);
    
    mrrChart = new Chart(ctx, { // Assign to the global variable
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display:true,
                    position:'top',
                    align:'end',
                    labels: {
                        usePointStyle: true, // Use circles instead of squares
                        pointStyle: 'circle', // Define the point style as a circle
                        font: {
                            size: 12 // Adjust the font size of the labels
                        },
                        padding: 28, // Space between legend items
                        boxWidth: 5, // Adjust the size of the legend icons
                        boxHeight: 5, // Adjust the height of the legend icons (if needed)
                        boxPadding: 15,
                    },
                    onClick: null, // Disable the default click behavior
                },
                tooltip: { enabled: false }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    stacked: true,
                    ticks: { autoSkip: false }
                },
                y: {
                    beginAtZero: true,
                    stacked: true,
                    ticks: {
                        autoSkip: false,
                        stepSize: 1000,
                        callback: function(value) { return value / 1000 + 'k'; }
                    }
                }
            }
        }
    });

    initCustomTooltip(mrrChart);
}

function initDaysSelect() {
    document.getElementById('daysSelect').addEventListener('change', function(event) {
        const days = event.target.value;
        mrrChart.data = getChartData(parseInt(days));
        mrrChart.update(); // Now this will work
    });
}

function initCustomTooltip(chart) {
    const customTooltip = document.getElementById('customTooltip');
    const tooltipContent = document.getElementById('tooltipContent');

    chart.canvas.addEventListener('mousemove', (event) => {
        const points = chart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, false);

        if (points.length) {
            const firstPoint = points[0];
            const dataset = chart.data.datasets;
            let total = 0;

            let tooltipHTML = `<span style="font-weight: 600; font-size: 12px; margin-bottom: 10px;">MRR BREAKDOWN</span>`;


            dataset.forEach((ds, index) => {
                const value = ds.data[firstPoint.index] || 0;
                total += value;
                if (value > 0) {
                    tooltipHTML += `
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; width: 100%;">
                        <div style="width: 6px; height: 6px; background-color: ${ds.backgroundColor}; border-radius: 50%; margin-right: 5px;align-self: center;"></div> 
                        <span class="tooltip-label">${ds.label}</span>
                        <span class="tooltip-value">$${value}</span>
                    </div>`;
                }
            });

            tooltipHTML +=  `
            <div style="border-bottom: 1px solid rgba(255, 255, 255, 0.1); margin-top: 14px;"></div> 

            <div style="display: flex; justify-content: space-between; margin-bottom: 16px; margin-top:8px">
                <div style="width: 6px; height: 6px; background-color: #F24A4A ; border-radius: 50%; margin-right: 5px;align-self: center;"></div> 
                <span class="tooltip-label">NET MRR</span>
                <span class="tooltip-value">$${total}</span>
            </div>`;
            tooltipContent.innerHTML = tooltipHTML;
            customTooltip.style.left = event.pageX + 'px';
            customTooltip.style.top = event.pageY + 'px';
            customTooltip.style.display = 'block';
        } else {
            customTooltip.style.display = 'none';
        }
    });
}
