var DataTableIndexs = $('#DataTable').DataTable({
    'language': {
        'url': datatable_lang,
    },
    // 'stateSave': true,
    'autoWidth': false,
    'responsive': true,
    'processing': true,
    'serverSide': true,
    'order': [
        //[1, 'desc']
    ],
    'columnDefs': [
        {'targets': 'no-sort', 'orderable': false, 'searchable': false},
        {'targets': 'th-action', 'orderable': false, 'searchable': false},
        { 'targets': [0], 'width': '20px'},
        { 'targets': [1], 'width': '20px'},
        { 'targets': [6], 'width': '70px'}
    ],
    'lengthMenu': [
        [10, 30, 50, 100, -1],
        [10, 30, 50, 100, 'All']
    ],
    'ajax': {
        'type': 'POST',
        'url': window.location.href
    },
    'drawCallback': function( settings ) {
        var api_table = this.api();
        dataTableDrawCallback(); // standard setting

        $('.delete_single').on('click', function(i) {
            var data_pk = [];
            data_pk = [$(this).attr('data-pk')];
            $('.noty_layout').remove(); // close jsnotif
            cfSwalDelete(data_pk,api_table,admin_url+a_mod+'/delete');
        });

        $('.delete_multi').on('click', function() {
            var data_pk = [];
            $('.row_data:checked').each(function(i) {
                data_pk[i] = $(this).val();
            });
            if (data_pk != '' && data_pk != 'on') {
                $('.noty_layout').remove(); // close jsnotif
                cfSwalDelete(data_pk,api_table,admin_url+a_mod+'/delete');
            }
        });
    }
});

var DataTableIndex = $('#DataTable-rebate').DataTable({
    'language': {
        'url': datatable_lang,
    },
    // 'stateSave': true,
    'autoWidth': false,
    'responsive': true,
    'processing': true,
    'serverSide': true,
    'order': [
        //[1, 'desc']
    ],
    'columnDefs': [
        {'targets': 'no-sort', 'orderable': false, 'searchable': false},
        {'targets': 'th-action', 'orderable': false, 'searchable': false},
        { 'targets': [0], 'width': '20px'},
        { 'targets': [1], 'width': '20px'},
    ],
    'lengthMenu': [
        [10, 30, 50, 100, -1],
        [10, 30, 50, 100, 'All']
    ],
    'ajax': {
        'type': 'POST',
        'url': window.location.href
    },
    'drawCallback': function( settings ) {
        var api_table = this.api();
        dataTableDrawCallback(); // standard setting

        $('.delete_single').on('click', function(i) {
            var data_pk = [];
            data_pk = [$(this).attr('data-pk')];
            $('.noty_layout').remove(); // close jsnotif
            cfSwalDelete(data_pk,api_table,admin_url+a_mod+'/delete');
        });

        $('.delete_multi').on('click', function() {
            var data_pk = [];
            $('.row_data:checked').each(function(i) {
                data_pk[i] = $(this).val();
            });
            if (data_pk != '' && data_pk != 'on') {
                $('.noty_layout').remove(); // close jsnotif
                cfSwalDelete(data_pk,api_table,admin_url+a_mod+'/delete');
            }
        });
    }
});

$('#form_upload').on('submit',function(e){
    e.preventDefault();
    // $('.submit_upload').find('i').removeClass().addClass('icon-spinner2 spinner mr-2').attr('disabled', 'disabled');
    $('.submit_upload').prop('disabled', true);
    $('.rows-upload .col-md-8').append('<span class="loading"><i class="fa fa-spinner spinner mr-2"></i> Loading</span>');
    $('.noty_layout').remove();
    var formData = new FormData(this);
    var form = $('#form_update');
    $.ajax({
        //url: admin_url + a_mod + '/submit-update',
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,  
        processData:false,
        cache: false,
        success:function(response){
            cfNotif(response['alert']);
            $('.rows-upload .col-md-8 span.loading').remove();
            // $('.submit_upload').find('i').removeClass().addClass('fa fa-upload mr-2').removeAttr('disabled');
            if(response['alert']['type']=='success'){
                DataTableIndexs.draw();
                $('#form_upload').find('input[name=file]').val('');
                if( response['alert']['message']!=null&&response['alert']['message']!='' ){
                    $('.alert-upload').html('<div class="alert alert-' +response['alert']['type']+ ' alert-styled-left alert-arrow-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>×</span></button>' +response['alert']['message']+ '</div>');
                }
            }
            $('.submit_upload').prop('disabled', false);
        }
    })
    return false;
});

$('#form_claim_all_rebate').on('submit',function(e){
    e.preventDefault();
    $('.submit_claim_all_rebate').find('i').removeClass().addClass('icon-spinner2 spinner mr-2').attr('disabled', 'disabled');
    // $('.submit_claim_all_rebate').prop('disabled', true);
    $('.noty_layout').remove();
    var formData = new FormData(this);
    var form = $('#form_update');
    $.ajax({
        //url: admin_url + a_mod + '/submit-update',
        type: 'POST',
        data: formData,
        dataType: 'json',
        contentType: false,  
        processData:false,
        cache: false,
        success:function(response){
            cfNotif(response['alert']);
            $('.rows-upload .col-md-8 span.loading').remove();
            if(response['alert']['type']=='success'){
                DataTableIndex.draw();
            }
            $('.submit_claim_all_rebate').find('i').removeClass().addClass('fa fa-save');
            $('.submit_claim_all_rebate').prop('disabled', false);
        }
    })
    return false;
});