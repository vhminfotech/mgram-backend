
$( document ).ready(function() {
    options = {
        chart: { height: 350, type: "bar", toolbar: { show: !1 } },
        plotOptions: { bar: { dataLabels: { position: "top" } } },
        dataLabels: {
            enabled: !0,
            formatter: function (e) { return e; },
            offsetY: -22,
            style: { fontSize: "12px", colors: ["#304758"] },
        },
        series: [
            {
                name: "Users",
                // data: [0,0,0,0,0,0,0,0,0,0,0,0],
            },
        ],
        noData: {
            text: 'Loading...'
        },
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
            text: "Loading...",
            floating: !0,
            offsetY: 330,
            align: "center",
            style: { color: "#444", fontWeight: "600" },
        },
    };

    const chart = new ApexCharts(
        document.querySelector("#monthly_users"),
        options
    );
    chart.render();

    ajaxCall();

    //changeYear event trigger's
    dp.on('changeYear', function (e) {
        const formData = new FormData();
        formData.append('date', e.date.getFullYear());

        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            url: baseurl +'ajaxGetYear',
            data: formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            async: false,
            success: function (response) {
                chart.updateSeries([{
                    data: response
                }]);
                chart.updateOptions({
                    title: {
                        text: e.date.getFullYear() + " Year's Subscribers"
                    }
                });
            }
        });
    });

    function ajaxCall(){
        const formData = new FormData();
        formData.append('date', new Date().getFullYear());

        $.ajax({
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
            url: baseurl +'ajaxGetYear',
            data: formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            async: false,
            success: function (response) {
                chart.updateSeries([{
                    data: response
                }]);
                chart.updateOptions({
                    title: {
                        text: new Date().getFullYear() + " Year's Subscribers"
                    }
                });
            }
        });
    }
});


$("#yearpicker").val(new Date().getFullYear());
const dp = $("#yearpicker").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years",
    autoclose: true, //to close picker once year is selected
});


