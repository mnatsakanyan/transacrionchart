(function ($) {
    // Submit Post on Click events on links
    $('.post-submit').each(function () {
        $(this).on('click', function (e) {
            e.preventDefault();
            var action = $(this).data('action');
            var token = $('meta[name="csrf-token"]').attr('content');
            var html = '<form id="post-submit-form" action="' + action + '" method="post" class="hide">'
                html += '<input type="hidden" name="_token" value="' + token + '">';
            html += '</form>';
            $('body').append(html);
            $('#post-submit-form').submit();
        })
    });

    // Data Tables
    var dataTables = $('.data-table');
    var dt_object = [];
    if (dataTables.length > 0) {
        dataTables.each(function (index,value) {
            var url = $(this).data('url');
            var columnsSelect = $(this).data('columns-select');
            var columnsIgnore = $(this).data('columns-ignore');
            var dataExport = $(this).data('export');

            var columns = [];
            for (var x = 0; x < columnsSelect.length; x++) {
                columns.push({
                    data: columnsSelect[x],
                    name: columnsSelect[x]
                })
            }

            var buttons = [];
            if (typeof dataExport !== 'undefined' && dataExport) {
                buttons = [
                    {
                        extend: 'excel',
                        className: 'btn btn-black',
                        exportOptions: {
                            columns: 'th:not(.actions)'
                        }
                    }
                ]
            }

            dt_object[index]= $(this).DataTable({
                dom: '<"html5buttons xs-mb-5" B>lfrtpi',
                buttons: buttons,
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.16/i18n/English.json"
                },
                columnDefs: [
                    {
                        orderable: false,
                        targets: columnsIgnore
                    },
                ],
                autoWidth: false,
                processing: true,
                serverSide: true,
                ajax: url,
                columns: columns
            });
        });
    }

    // Alerts
    $('div.alert').not('.alert-important').delay(3000).slideUp(350);

    // Delete Confirmation
    $(document).on('click', '.delete-entity', function (e) {
        var self = $(this);
        e.preventDefault()
        console.log(lang);

        bootbox.confirm({
            title: lang.confirm_title,
            message: lang.confirm_body,
            buttons: {
                confirm: {
                    label: lang.approve,
                    className: 'btn-primary'
                },
                cancel: {
                    label: lang.cancel,
                    className: 'btn-default'
                }
            },
            callback: function (result) {
                if (result) {
                    var action = self.data('action');
                     var token = $('meta[name="csrf-token"]').attr('content');
                    // var html = '<form id="delete-submit-form" action="' + action + '" method="DELETE" class="hide">'
                    //     html += '<input type="hidden" name="_token" value="' + token + '">';
                    //     html += '<input type="hidden" name="_method" value="DELETE">';
                    // html += '</form>';
                    // console.log(html);
                    // $('body').append(html);
                    // $('#delete-submit-form').submit();
                    $.ajax({
                        url: action,
                        type: 'DELETE',
                        data: {_token:token},
                        success: function(result) {
                            console.log("delete",dt_object)
                            if (dt_object.length > 0){
                                dt_object[0].ajax.reload();
                            }
                        }
                    });
                }
            }
        });
    });
})(jQuery);