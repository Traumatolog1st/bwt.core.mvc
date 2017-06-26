jQuery( document ).ready(function() {
    jQuery('#date').datetimepicker({
        viewMode: 'years',
        format: 'DD/MM/YYYY',
        maxDate: '12/31/2010',
        useCurrent: false
    });
});