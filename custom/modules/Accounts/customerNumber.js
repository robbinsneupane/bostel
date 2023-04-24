$(document).ready(function () {
    if ($('#customer_id_c').val() != '') {
        $('[data-label="LBL_CREATE_CUSTOMER_ID_C"]').hide();
        $('[field="create_customer_id_c"]').hide();
    } else {
        $('[data-label="LBL_CUSTOMER_ID_C"]').hide();
        $('[field="customer_id_c"]').hide();
    }
});
