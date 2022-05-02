// ============================================== doughnut chart ============================================

var xValuesDoughnut = ["Italy", "France", "Spain", "USA"];
var yValuesDoughnut = [55, 55, 55, 55, 55, 55, 55, 55];
var barColorsDoughnut = [
  "#17f510",
  "#09CE02",
  "#ffbd14",
  "#D0D401",
  "#FA6767",
  "#ec4444",
  "#fff",
  "#fff",
];

new Chart("paymentTrendDoughnutChart", {
  type: "doughnut",
  data: {
    // labels: xValuesDoughnut,
    datasets: [
      {
        backgroundColor: barColorsDoughnut,
        data: yValuesDoughnut,
      },
    ],
  },
  options: {
    responsive: false,
    rotation: 0.75 * Math.PI,
    circumference: 2 * Math.PI,
    title: {
      display: false,
    },
    legend: {
      display: false,
    },
    // cutoutPercentage: 55
  },
});

new Chart("InquiriesTrendDoughnutChart", {
  type: "doughnut",
  data: {
    // labels: xValuesDoughnut,
    datasets: [
      {
        backgroundColor: barColorsDoughnut,
        data: yValuesDoughnut,
      },
    ],
  },
  options: {
    responsive: false,
    rotation: 0.75 * Math.PI,
    circumference: 2 * Math.PI,
    title: {
      display: false,
    },
    legend: {
      display: false,
    },
    // cutoutPercentage: 55
  },
});

new Chart("industryPerformanceChart", {
  type: "doughnut",
  data: {
    // labels: xValuesDoughnut,
    datasets: [
      {
        backgroundColor: barColorsDoughnut,
        data: yValuesDoughnut,
      },
    ],
  },
  options: {
    responsive: false,
    rotation: 0.75 * Math.PI,
    circumference: 2 * Math.PI,
    title: {
      display: false,
    },
    legend: {
      display: false,
    },
    // cutoutPercentage: 55
  },
});

new Chart("CreditRatioChart", {
  type: "doughnut",
  data: {
    // labels: xValuesDoughnut,
    datasets: [
      {
        backgroundColor: barColorsDoughnut,
        data: yValuesDoughnut,
      },
    ],
  },
  options: {
    responsive: false,
    rotation: 0.75 * Math.PI,
    circumference: 2 * Math.PI,
    title: {
      display: false,
    },
    legend: {
      display: false,
    },
    // cutoutPercentage: 55
  },
});

// =============================================== line chart ================================================

var xValues = [
  "Jan",
  "Feb",
  "Mar",
  "Apr",
  "May",
  "Jun",
  "Jul",
  "Aug",
  "Sep",
  "Oct",
  "Nov",
  "Dec",
];

new Chart("scoreHistoryChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [
      {
        data: [0, 10, 5, 20, 15, 30, 18, 45, 25, 40, 32],
        borderColor: "#26DA20",
        borderWidth: "2",
        fill: false,
      },
      {
        data: [0, 14, 8, 23, 19, 35, 23, 49, 30, 46, 39],
        borderColor: "#FFBD14",
        borderWidth: "2",
        fill: false,
      },
      {
        data: [0, 5, 3, 16, 12, 22, 13, 40, 21, 35, 28],
        borderColor: "#31E6FF",
        borderWidth: "2",
        fill: false,
      },
    ],
  },
  options: {
    legend: { display: false },
    scales: {
      xAxes: [
        {
          display: true,
          gridLines: {
            display: true,
          },
        },
      ],
      yAxes: [
        {
          display: true,
          gridLines: {
            display: false,
          },
        },
      ],
    },
  },
});

// ===================================================== bar chart ============================================

var yValues = [, 90, , 104, , , , 120, 137, 127];
var barColors = [
  ,
  "#FFBD14",
  ,
  "#31E6FF",
  ,
  ,
  ,
  "#FFBD14",
  "#09CE02",
  "#09CE02",
];

new Chart("historicalTradeInformationChart", {
  data: {
    labels: xValues,
    datasets: [
      {
        type: "bar",
        backgroundColor: barColors,
        data: yValues,
      },
      {
        type: "line",
        // label: 'Line Dataset',
        // backgroundColor: "red",
        fill: false,
        data: [50, 55, 60, 65, 70, 75, 80, 85, 90, 95, 100, 105],
      },
    ],
  },
  options: {
    legend: { display: false },
    title: {
      display: true,
      // text: "World Wine Production 2018"
    },
    scales: {
      xAxes: [
        {
          display: true,
          gridLines: {
            display: true,
            drawOnChartArea: false,
          },
        },
      ],
      yAxes: [
        {
          display: true,
          gridLines: {
            display: true,
            drawOnChartArea: false,
          },
        },
      ],
    },
  },
});

let historicalChart = document.querySelector(
  ".historical-trade-information-bar-chart"
);
let tradePaymentHeight = document.querySelector(
  ".trade-payment-information-height"
);

let historicalChartObserver = new ResizeObserver((entries) => {
 let height = entries[0].contentRect.height;
 if(screen.width > 991){
 tradePaymentHeight.style.height = `${height+50}px`;
 }
});
historicalChartObserver.observe(historicalChart);



let scoreHistoryChart = document.querySelector(".score-history-line-chart");
let contactInformation = document.querySelector(
  ".contact-information.custom-box-shadow"
);

const scoreHistoryChartObserver = new ResizeObserver((entries) => {

  let height = entries[0].contentRect.height;
    if(screen.width > 991){
      scoreHistoryChart.style.height = `${height+50}px`;
    }

});

scoreHistoryChartObserver.observe(contactInformation);



let msgUpperBlurDiv = document.querySelectorAll(".msg-upper-blur-div");

if (msgUpperBlurDiv.length > 0) {
  if(screen.width < 992) {
      msgUpperBlurDiv[0].style.cssText = "position: relative;";
    } else {
      msgUpperBlurDiv[0].style.cssText = "position: absolute;";
    }
}