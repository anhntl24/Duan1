<script>
    !(function(a) {
        "use strict";
        a(function() {
            if (a("#bar").length) {
                var e = a("#bar").get(0).getContext("2d");
                e.height = 20;
                new Chart(e, {
                    type: "bar",
                    data: {
                        labels: ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"],
                        datasets: [{
                            label: "Doanh thu: ",
                            backgroundColor: "#1ccab8",
                            borderColor: "transparent",
                            borderWidth: 2,
                            categoryPercentage: 0.5,
                            hoverBackgroundColor: "#00d8c2",
                            hoverBorderColor: "transparent",
                            data: [
                                <?php foreach ($thongkedoanhthu as $doanhthu) {
                                    extract($doanhthu);
                                    echo $total . ",";
                                } ?>
                            ],
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        legend: {
                            display: !1,
                            labels: {
                                fontColor: "#50649c"
                            }
                        },
                        tooltips: {
                            enabled: !0,
                            callbacks: {
                                label: function(e, a) {
                                    return a.datasets[e.datasetIndex].label + e.yLabel;
                                },
                            },
                        },
                        scales: {
                            xAxes: [{
                                barPercentage: 0.35,
                                categoryPercentage: 0.4,
                                display: !0,
                                gridLines: {
                                    color: "transparent",
                                    borderDash: [0],
                                    zeroLineColor: "transparent",
                                    zeroLineBorderDash: [2],
                                    zeroLineBorderDashOffset: [2]
                                },
                                ticks: {
                                    fontColor: "#a4abc5",
                                    beginAtZero: !0,
                                    padding: 12
                                },
                            }],
                            yAxes: [{
                                gridLines: {
                                    color: "#8997bd29",
                                    borderDash: [3],
                                    drawBorder: !1,
                                    drawTicks: !1,
                                    zeroLineColor: "#8997bd29",
                                    zeroLineBorderDash: [2],
                                    zeroLineBorderDashOffset: [2]
                                },
                                ticks: {
                                    fontColor: "#a4abc5",
                                    beginAtZero: !0,
                                    padding: 12,
                                    callback: function(e) {
                                        if (!(e % 10)) return e;
                                    },
                                },
                            }],
                        },
                    },
                });
            }
        });
    })(jQuery);
</script>