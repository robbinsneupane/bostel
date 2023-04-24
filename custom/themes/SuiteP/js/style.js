$(document).ready(function () {
    //Remove View change log from all modules
    // $('#tab-actions ul.dropdown-menu li #btn_view_change_log').parent().remove();
    // $('#btn_view_change_log').remove();//top
    // $('#btn_view_change_log').remove();//bottom
    $('#tab-actions ul.dropdown-menu li').each(function () {
        if ($(this).html() == '') {
            $(this).remove();
        }
    });

    // code to add/remove classes from footer menu
    if (window.innerWidth < 768) {
        $('footer ul li .footer-action').each(function () {
            $(this).removeClass('btn btn-footer');
        })
    } else {
        $('footer ul li .footer-action').each(function () {
            $(this).addClass('btn btn-footer');
        })
    }

    let h2Title = $('#bootstrap-container #content #pagecontent div.moduleTitle h2');
    if (!($(h2Title).hasClass('module-title-text'))) {
        $(h2Title).addClass('module-title-text');
    }
});

// Listen for orientation changes
window.addEventListener("orientationchange", function () {
    window.location.reload();
}, false);

$(document).ajaxStop(function () {

    //Remove View change log from all modules
    // $('#tab-actions ul.dropdown-menu li #btn_view_change_log').parent().remove();
    // $('#btn_view_change_log').remove();//top
    // $('#btn_view_change_log').remove();//bottom
    $('#tab-actions ul.dropdown-menu li').each(function () {
        if ($(this).html() == '') {
            $(this).remove();
        }
    });
});


// js for popup modals start
if (typeof (showLoading) == 'undefined') {
    function showLoading() {
        var loading = '<div id="loadingPage" align="center" style="vertical-align:middle;"><img src="' + SUGAR.themes.loading_image + '" align="absmiddle" /> <b>' + SUGAR.language.get('app_strings', 'LBL_LOADING_PAGE') + '</b></div>';
        $('#popup-window-modal .modal-body').html(loading)
        $('#popup-window-modal .modal-title').html('');
    }
}

if (typeof (open_popup_modal) == 'undefined') {
    function open_popup_modal(module_name, popup_request_data, popup_mode = '', create, initial_filter = '') {
        // set the variables that the popup will pull from
        window.document.popup_request_data = popup_request_data;
        window.opener = window; // here no opner window, set openr window as same window
        // window.document.close_popup = close_popup;

        $('#popup-window-modal').modal('show');
        // launch the popup
        URL = 'index.php?'
            + 'module=' + module_name
            + '&action=Popup&ajax_load=1';

        if (initial_filter != '') {
            URL += '&query=true' + initial_filter;
        }

        // if (hide_clear_button) {
        //     URL += '&hide_clear_button=true';
        // }

        if (popup_mode == '' && popup_mode == 'undefined') {
            popup_mode = 'single';
        }
        URL += '&mode=' + popup_mode;
        if (create == '' && create == 'undefined') {
            create = 'false';
        }
        URL += '&create=' + create;

        // if (metadata != '' && metadata != 'undefined') {
        //     URL += '&metadata=' + metadata;
        // }

        // Bug #46842 : The relate field field_to_name_array fails to copy over custom fields
        // post fields that should be populated from popup form
        var request_data = [];
        if (popup_request_data.jsonObject) {
            request_data = popup_request_data.jsonObject;
        } else {
            request_data = popup_request_data;
        }
        console.log(URL);
        console.log(request_data);
        var field_to_name_array_url = '';
        if (request_data && request_data.field_to_name_array != 'undefined') {
            for (var key in request_data.field_to_name_array) {
                if (key.toLowerCase() != 'id') {
                    field_to_name_array_url += '&field_to_name[]=' + encodeURIComponent(key.toLowerCase());
                }
            }
        }

        if (field_to_name_array_url) {
            URL += field_to_name_array_url;
        }
        getSetHtml()
    }
}

if (typeof (getSetHtml) == 'undefined') {
    function getSetHtml() {
        showLoading();
        $.ajax({
            url: URL,
            // dataType: 'json'
        }).done(function (response) {
            jsonResponse = getJson(response);
            if (!jsonResponse) {
                $('#popup-window-modal .modal-body').html(response);
            } else {
                setPopupModalHtml(jsonResponse);
            }
        });
    }
}

if (typeof (send_back_modal) == 'undefined') {
    function send_back_modal(module, id) {
        var associated_row_data = associated_javascript_data[id];

        var request_data = JSON.parse(window.document.forms['popup_query_form'].request_data.value);

        var passthru_data = Object();
        if (typeof (request_data.passthru_data) != 'undefined') {
            passthru_data = request_data.passthru_data;
        }
        var form_name = request_data.form_name;
        var field_to_name_array = request_data.field_to_name_array;

        var call_back_function = window.opener[request_data.call_back_function];
        if (typeof call_back_function == 'undefined' && request_data.form_name == "ComposeView") {
            let funArray = request_data.call_back_function.split('.');
            call_back_function = window.opener[funArray[0]][funArray[1]][funArray[2]][funArray[3]];
        }
        var array_contents = Array();

        // constructs the array of values associated to the bean that the user clicked
        var fill_array_contents = function (the_key, the_name) {
            var the_value = '';
            if (module != '' && id != '') {
                if (associated_row_data['DOCUMENT_NAME'] && the_key.toUpperCase() == "NAME") {
                    the_value = associated_row_data['DOCUMENT_NAME'];
                } else if ((the_key.toUpperCase() == 'USER_NAME' || the_key.toUpperCase() == 'LAST_NAME' || the_key.toUpperCase() == 'FIRST_NAME')
                    && typeof (is_show_fullname) != 'undefined' && is_show_fullname && form_name != 'search_form') {
                    //if it is from searchform, it will search by assigned_user_name like 'ABC%', then it will return nothing
                    the_value = associated_row_data['FULL_NAME'];
                } else {
                    the_value = associated_row_data[the_key.toUpperCase()];
                }
            }

            if (typeof (the_value) == 'string') {
                the_value = the_value.replace(/\r\n|\n|\r/g, '\\n');
            }

            array_contents.push('"' + the_name + '":"' + the_value + '"');
        }

        for (var the_key in field_to_name_array) {
            if (the_key != 'toJSON') {
                if (YAHOO.lang.isArray(field_to_name_array[the_key])) {
                    for (var i = 0; i < field_to_name_array[the_key].length; i++) {
                        fill_array_contents(the_key, field_to_name_array[the_key][i]);
                    }
                }
                else {
                    fill_array_contents(the_key, field_to_name_array[the_key]);
                }
            }
        }

        var popupConfirm = confirmDialog(array_contents, form_name);

        var name_to_value_array = JSON.parse('{' + array_contents.join(",") + '}');

        $('#popup-window-modal').modal('hide');
        $('#popup-window-modal-close').trigger('click');

        var result_data = {
            "form_name": form_name,
            "name_to_value_array": name_to_value_array,
            "passthru_data": passthru_data,
            "popupConfirm": popupConfirm
        };

        call_back_function(result_data);
        let fieldId = Object.keys(name_to_value_array)[1];
        if (typeof $('#' + fieldId).data('populate-field') != 'undefined') {
            populateFields(fieldId, Object.values(name_to_value_array)[0])
        }
    }
}

var popup_query_form = '#popup-window-modal .modal-body table.edit.view #popup_query_form';

$(document).on('submit', popup_query_form, function (e) {
    showLoading();
    e.preventDefault();
    e.stopImmediatePropagation();
    e.stopPropagation()
    $.ajax({
        url: 'index.php?ajax_load=1',
        method: $(this).attr('method').toUpperCase(),
        data: $(this).serialize(),
        cache: false,
        dataType: 'json'
    }).done(function (response) {
        setPopupModalHtml(response);
    });
})

if (typeof (setPopupModalHtml) == 'undefined') {
    function setPopupModalHtml(response) {
        var moduleList = SUGAR.language.get('app_list_strings', 'moduleList');
        $('#popup-window-modal .modal-body').html(response.content);
        $('#popup-window-modal .modal-title').html(moduleList[response.menu.module]);
    }
}

$(document).on('submit', '#popup-window-modal .modal-body [id^="form_QuickCreate_"]', function (e) {
    showLoading();
    e.preventDefault();
    e.stopImmediatePropagation();
    e.stopPropagation()
    $.ajax({
        url: 'index.php',
        method: $(this).attr('method').toUpperCase(),
        data: $(this).serialize(),
        cache: false,
        dataType: 'json'
    }).done(function (response) {
        if (response.status == 'success') {
            getSetHtml();
        } else {
            $('#popup-window-modal .modal-body').html("Some error has been occured");
        }
    });
})

// js for popup modals End

if (typeof (getJson) == 'undefined') {
    function getJson(str) {
        try {
            return JSON.parse(str);
        } catch (e) {
            return false;
        }
    }
}

$(document).on('hidden.bs.modal', '#popup-window-modal', function () {
    /**
     * Check if there are still modals open
     * Body still needs class modal-open
     */
    if ($('body').find('.modal.in').length) {
        $('body').addClass('modal-open');
    }
});


$(document).on('click', '#popup-window-modal .modal-body .listViewThLinkS1', function (e) {
    e.preventDefault();
    URL = $(this).attr('href');
    getSetHtml()
})

if (typeof (paginateList) == 'undefined') {
    function paginateList(url, saveChecks = false) {
        URL = url;
        if (saveChecks) {
            $('#popup-window-modal #MassUpdate input[name="mass[]"]:checked').each(function () {
                URL += '&mass[]=' + $(this).val();
            })
        }
        getSetHtml()
    }
}

$(document).on('click', '.modal-cal-edit #radio_call, .modal-cal-edit #radio_task', function () {
    $(this).prop('checked', true);
})

/**
 * function modal_set_return_and_save_background
 * call when subpanel select return 
 */
if (typeof (modal_set_return_and_save_background) == 'undefined') {
    function modal_set_return_and_save_background(popup_reply_data) {
        var form_name = popup_reply_data.form_name;
        var name_to_value_array = popup_reply_data.name_to_value_array;
        var passthru_data = popup_reply_data.passthru_data;
        var select_entire_list = typeof (popup_reply_data.select_entire_list) === 'undefined' ? 0 : popup_reply_data.select_entire_list;
        var current_query_by_page = typeof (popup_reply_data.current_query_by_page) === 'undefined' ? '' : popup_reply_data.current_query_by_page.replace(/&quot;/g, '');
        // construct the POST request
        var query_array = new Array();
        if (name_to_value_array != 'undefined') {
            for (var the_key in name_to_value_array) {
                if (the_key == 'toJSON') {
                    /* just ignore */
                }
                else {
                    query_array.push(the_key + "=" + name_to_value_array[the_key]);
                }
            }
        }
        //construct the muulti select list
        var selection_list = popup_reply_data.selection_list;
        if (selection_list != 'undefined') {
            for (var the_key in selection_list) {
                query_array.push('subpanel_id[]=' + selection_list[the_key])
            }
        }
        var module = get_module_name();
        var id = get_record_id();

        query_array.push('value=DetailView');
        query_array.push('module=' + module);
        query_array.push('http_method=get');
        query_array.push('return_module=' + module);
        query_array.push('return_id=' + id);
        query_array.push('record=' + id);
        query_array.push('isDuplicate=false');
        query_array.push('action=Save2');
        query_array.push('inline=1');
        query_array.push('select_entire_list=' + select_entire_list);
        if (select_entire_list == 1) {
            query_array.push('current_query_by_page=' + current_query_by_page);
        }
        var refresh_page = escape(passthru_data['refresh_page']);
        for (prop in passthru_data) {
            if (prop == 'link_field_name') {
                query_array.push('subpanel_field_name=' + escape(passthru_data[prop]));
            } else {
                if (prop == 'module_name') {
                    query_array.push('subpanel_module_name=' + escape(passthru_data[prop]));
                } else if (prop == 'prospect_ids') {
                    for (var i = 0; i < passthru_data[prop].length; i++) {
                        query_array.push(prop + '[]=' + escape(passthru_data[prop][i]));
                    }
                } else {
                    query_array.push(prop + '=' + escape(passthru_data[prop]));
                }
            }
        }

        var query_string = query_array.join('&');
        request_map[request_id] = passthru_data['child_field'];

        var returnstuff = http_fetch_sync('index.php', query_string);
        request_id++;

        // Bug 52843
        // If returnstuff.responseText is empty, don't process, because it will blank the innerHTML
        if (typeof returnstuff != 'undefined' && typeof returnstuff.responseText != 'undefined' && returnstuff.responseText.length != 0) {
            got_data(returnstuff, true);
        }

        if (refresh_page == 1) {
            document.location.reload(true);
        }

        $('#popup-window-modal').modal('hide');
        $('#popup-window-modal-close').trigger('click');
    }
}

/**
 * Added listener to listen on close of confirm modal
 * Have to hide all masks, multiple masks not hiding previsouly 
 */
$(document).on('click', '.yui-panel-container .yui-module.yui-overlay .container-close', function () {
    closeConfirmModal()
})

/**
 * function closeConfirmModal
 * close/remove multiple modal masks 
 */
if (typeof (closeConfirmModal) == 'undefined') {
    function closeConfirmModal() {
        $('.mask').each(function () {
            if ($(this).hide() == false)
                $(this).hide()
        })
    }
}

$(document).on('click', '#logout_link', function () {
    $('#logout-confirm-modal').modal('show');
    $('#logout-confirm-modal .modal-footer a').attr('href', $(this).data('href'));
})

$(document).on('click', '.input-group-icon i.fa-eye', function () {
    $('#username_password').attr('type', 'text');
    $('.input-group-icon i.fa-eye-slash').show();
    $('.input-group-icon i.fa-eye').hide();
});

$(document).on('click', '.input-group-icon i.fa-eye-slash', function () {
    $('#username_password').attr('type', 'password');
    $('.input-group-icon i.fa-eye').show();
    $('.input-group-icon i.fa-eye-slash').hide();
});

/**
 * function populateFields
 * used to populate fields after sqs enabled field.
 * @param {*} fieldId 
 * @param {*} record_id 
 */
function populateFields(fieldId, record_id) {
    let module = $('#' + fieldId).data('module');
    let relateTable = $('#' + fieldId).data('relate-table');
    let action = $('#' + fieldId).data('action');

    $.ajax({
        url: 'index.php?'
            + 'module=' + module
            + '&relate_table=' + relateTable
            + '&action=' + action
            + '&record_id=' + record_id
            + '&ajax_load=1',
        cache: false,
        dataType: 'json',
    }).done(function (response) {
        if (response) {
            response.forEach(element => {
                $('#' + element.field).val(element.value)
            });
        }
    });
}

// function setEmailAddressFieldFromPopup

function customChangeFirstTab(src) {
    var selected = $(src).attr('id');
    var selectedHtml = $(selected.context).html();
    $('#xstab0').html(selectedHtml);
    var i = $(src).parents('li').index();

    setTimeout(() => {
        if (i == 0) {
            $(src).parents('li').parents('li').addClass('active');
        } else {
            $(src).parents('li').parents('li').removeClass('active');
        }
    }, 50);

    selectTab(parseInt(i));
    return true;
}

/**
 * Update Alert Manager (Navigation bar element)
 */
Alerts.prototype.updateManager = function () {
    var url = 'index.php?module=Alerts&action=get&to_pdf=1';
    $.ajax(url).done(function (data) {
        if (data === 'lost session') {
            Alerts.prototype.redirectToLogin();
            return false;
        }
        // remove the jsAlert message
        for (var replaceMessage in Alerts.prototype.replaceMessages) {
            data = data.replaceAll(
                Alerts.prototype.replaceMessages[replaceMessage].search,
                Alerts.prototype.replaceMessages[replaceMessage].replace
            );
        }

        var alertsDiv = $('.desktop_notifications #alerts');
        alertsDiv.html(data);

        var alerts = $('<div></div>');
        $(data).appendTo(alerts);
        var alertCount = $(alerts).children('.alert').length;
        var alertCountDiv = $('.alert_count');
        var desktopNotificationsDiv = $('.desktop_notifications');
        var alertButtonDiv = $('.alertsButton');


        alertCountDiv.html(alertCount);
        if (alertCount > 0) {
            alertsDiv.addClass('has-alerts');
            desktopNotificationsDiv.addClass('has-alerts');
            alertButtonDiv.removeClass('btn-').addClass('btn-danger');
            alertCountDiv.removeClass('hidden');
        }
        else {
            desktopNotificationsDiv.removeClass('has-alerts');
            alertsDiv.removeClass('has-alerts');
            alertButtonDiv.removeClass('btn-danger').addClass('btn-success');
            alertCountDiv.addClass('hidden');
        }
    });
};

// window.addEventListener("pagehide", function (e) {
//     console.log('ffff');
//     var isMacLike = /(Mac|iPhone|iPod|iPad)/i.test(navigator.platform);
//     var isIOS = /(iPhone|iPod|iPad)/i.test(navigator.platform);
//     console.log(isMacLike, isIOS);
// });