(function(factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(['jquery', 'datatables.net'], function($) {
            return factory($, window, document);
        });
    } else if (typeof exports === 'object') {
        // CommonJS
        module.exports = function(root, $) {
            if (!root) {
                root = window;
            }
            if (!$ || !$.fn.dataTable) {
                // Require DataTables
                $ = require('datatables.net')(root, $).$;
            }
            return factory($, root, root.document);
        };
    } else {
        // Browser
        factory(jQuery, window, document);
    }
}(function($, window, document) {
    'use strict';
    var DataTable = $.fn.dataTable;

    // Set defaults for DataTables initialization
    $.extend(true, DataTable.defaults, {
        dom:
            "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
        renderer: 'bootstrap'
    });

    // Default class modification
    $.extend(DataTable.ext.classes, {
        sWrapper: "dataTables_wrapper dt-bootstrap4",
        sFilterInput: "form-control form-control-sm",
        sLengthSelect: "custom-select custom-select-sm form-control form-control-sm",
        sProcessing: "dataTables_processing card",
        sPageButton: "paginate_button page-item"
    });

    // Bootstrap paging button renderer
    DataTable.ext.renderer.pageButton.bootstrap = function(settings, host, idx, buttons, page, pages) {
        var api = new DataTable.Api(settings);
        var classes = settings.oClasses;
        var lang = settings.oLanguage.oPaginate;
        var aria = settings.oLanguage.oAria.paginate || {};
        var btnDisplay, btnClass, counter = 0;

        var attach = function(container, buttons) {
            var i, ien, node, button;
            var clickHandler = function(e) {
                e.preventDefault();
                if (!$(e.currentTarget).hasClass('disabled') && api.page() != e.data.action) {
                    api.page(e.data.action).draw('page');
                }
            };

            for (i = 0, ien = buttons.length; i < ien; i++) {
                button = buttons[i];

                if ($.isArray(button)) {
                    attach(container, button);
                } else {
                    btnDisplay = '';
                    btnClass = '';

                    switch (button) {
                        case 'ellipsis':
                            btnDisplay = '&#x2026;';
                            btnClass = 'disabled';
                            break;
                        case 'first':
                            btnDisplay = lang.sFirst;
                            btnClass = button + (page > 0 ? '' : ' disabled');
                            break;
                        case 'previous':
                            btnDisplay = lang.sPrevious;
                            btnClass = button + (page > 0 ? '' : ' disabled');
                            break;
                        case 'next':
                            btnDisplay = lang.sNext;
                            btnClass = button + (page < pages - 1 ? '' : ' disabled');
                            break;
                        case 'last':
                            btnDisplay = lang.sLast;
                            btnClass = button + (page < pages - 1 ? '' : ' disabled');
                            break;
                        default:
                            btnDisplay = button + 1;
                            btnClass = page === button ? 'active' : '';
                            break;
                    }

                    if (btnDisplay) {
                        node = $('<li>', {
                            'class': classes.sPageButton + ' ' + btnClass,
                            'id': idx === 0 && typeof button === 'string' ?
                                settings.sTableId + '_' + button :
                                null
                        })
                        .append($('<a>', {
                            'href': '#',
                            'aria-controls': settings.sTableId,
                            'aria-label': aria[button],
                            'data-dt-idx': counter,
                            'tabindex': settings.iTabIndex,
                            'class': 'page-link'
                        }).html(btnDisplay))
                        .appendTo(container);

                        settings.oApi._fnBindAction(node, { action: button }, clickHandler);

                        counter++;
                    }
                }
            }
        };

        attach($(host).empty().html('<ul class="pagination"/>').children('ul'), buttons);
    };

    // Initialize DataTable on document ready
    $(document).ready(function() {
        var dataTable = $('#dataTableHover').DataTable({
            paging: true,
            pagingType: "simple_numbers",
            pageLength: 10 // Set default page length here
        });

        // Handle form submission for adding new member
        $('#memberForm').on('submit', function(e) {
            e.preventDefault();

            // Get input values
            var name = $('#name').val();
            var position = $('#position').val();
            var age = $('#age').val();
            var startDate = $('#startDate').val();
            var salary = $('#salary').val();

            // Add a new row to the DataTable
            dataTable.row.add([
                name,
                position,
                age,
                startDate,
                salary,
                '<button class="btn btn-danger btn-sm delete-btn">Delete</button>'
            ]).draw(false);

            // Clear the form inputs
            $('#memberForm')[0].reset();
        });

        // Handle delete button click
        $('#dataTableHover tbody').on('click', '.delete-btn', function() {
            dataTable.row($(this).parents('tr')).remove().draw();
        });
    });

    return DataTable;
}));