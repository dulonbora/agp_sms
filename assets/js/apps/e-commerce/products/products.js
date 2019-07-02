(function () {
    $(document).ready(function () {
        $('#e-commerce-products-table').DataTable(
            {
                dom       : 'rt<"dataTables_footer"ip>',
                scrollY       : 'auto',
                scrollX       : false,
                autoWidth     : false,
                scrollCollapse: true
            }
        );

    });
})();