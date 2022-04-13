$(document).ready(function() {
    $(function () {
        var start = moment();
        var end = moment();

        function cb(start, end) {
            //$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
            $('#reportrange span').html("Date Filter");
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            showDropdowns: true,
            ranges: {
                'All': [moment($('#last_record_date').val()), moment()],
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
            }, cb);
        cb(start, end);
    });

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
        const start = picker.startDate;
        const end = picker.endDate;

        $('#reportrange span').html(start.format('DD-MM-YYYY') + ' - ' + end.format('DD-MM-YYYY'));

        // Reset custom search
        $.fn.dataTable.ext.search = [];

        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                const min = start;
                const max = end;
                const startDate = new Date(data[7]);
                if (min == null && max == null) {return true;}
                if (min == null && startDate <= max) {return true;}
                if (max == null && startDate >= min) {return true;}
                if (startDate <= max && startDate >= min) {return true;}
                return false;
            });
    });

    $("#filter").click(function(){
        $.fn.dataTable.ext.search.push(
            function( settings, data, dataIndex ){
                const table_operators = data[1] || "";
                const operator = $("#operators").val();

                if(operator !== ""){
                    return table_operators === operator;
                } else {
                    return true;
                }
            });

        table.draw();
    });
});
