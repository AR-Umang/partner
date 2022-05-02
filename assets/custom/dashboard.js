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

new Chart("scoreHistoryGraph", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [
      {
        data: [0, 5, 3, 16, 12, 22, 13, 40, 21, 35, 28],
        borderColor: "#2c80ff",
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


let tokenCardInnr = document.querySelector(".token-sale-graph.card-full-height .card-innr");
let scoreHistoryLineGraph = document.querySelector(".score-history-line-graph.custom-box-shadow");

const scoreHistoryGraphObserver = new ResizeObserver((entries) => {

  let height = entries[0].contentRect.height;
    if(screen.width > 991){
        scoreHistoryLineGraph.style.height = `${height+50}px`;
    }

});

scoreHistoryGraphObserver.observe(tokenCardInnr);