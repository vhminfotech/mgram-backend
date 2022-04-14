options = {
    chart: { height: 350, type: "bar", toolbar: { show: !1 } },
    plotOptions: { bar: { dataLabels: { position: "top" } } },
    dataLabels: {
        enabled: !0,
        formatter: function (e) {
            // return e + "%";
            return e;
        },
        offsetY: -22,
        style: { fontSize: "12px", colors: ["#304758"] },
    },
    series: [
        {
            name: "Users",
            data: monthly_users,
        },
    ],
    colors: ["#556ee6"],
    grid: { borderColor: "#f1f1f1" },
    xaxis: {
        categories: [
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
        ],
        position: "top",
        labels: { offsetY: -18 },
        axisBorder: { show: !1 },
        axisTicks: { show: !1 },
        crosshairs: {
            fill: {
                type: "gradient",
                gradient: {
                    colorFrom: "#D8E3F0",
                    colorTo: "#BED1E6",
                    stops: [0, 100],
                    opacityFrom: 0.4,
                    opacityTo: 0.5,
                },
            },
        },
        tooltip: { enabled: !0, offsetY: -35 },
    },
    fill: {
        gradient: {
            shade: "light",
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: void 0,
            inverseColors: !0,
            opacityFrom: 1,
            opacityTo: 1,
            stops: [50, 0, 100, 100],
        },
    },
    yaxis: {
        axisBorder: { show: !1 },
        axisTicks: { show: !1 },
        labels: {
            show: !1,
            formatter: function (e) {
                return e;
                // return e + "%";
            },
        },
    },
    title: {
        text: "Monthly Users",
        floating: !0,
        offsetY: 330,
        align: "center",
        style: { color: "#444", fontWeight: "500" },
    },
};
(chart = new ApexCharts(
    document.querySelector("#monthly_users"),
    options
)).render();
