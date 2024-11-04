(function( factory ){
	if ( typeof define === 'function' && define.amd ) {
		// AMD
		define( ['jquery', 'datatables.net'], function ( $ ) {
			return factory( $, window, document );
		} );
	}
	else if ( typeof exports === 'object' ) {
		// CommonJS
		module.exports = function (root, $) {
			if ( ! root ) {
				root = window;
			}

			if ( ! $ || ! $.fn.dataTable ) {
				// Require DataTables
				$ = require('datatables.net')(root, $).$;
			}

			return factory( $, root, root.document );
		};
	}
	else {
		// Browser
		factory( jQuery, window, document );
	}
}(function( $, window, document, undefined ) {
'use strict';
var DataTable = $.fn.dataTable;

// Set the defaults for DataTables initialisation
$.extend( true, DataTable.defaults, {
	dom:
		"<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
		"<'row'<'col-sm-12'tr>>" +
		"<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
	renderer: 'bootstrap'
});

// Default class modification
$.extend( DataTable.ext.classes, {
	sWrapper:      "dataTables_wrapper dt-bootstrap4",
	sFilterInput:  "form-control form-control-sm",
	sLengthSelect: "custom-select custom-select-sm form-control form-control-sm",
	sProcessing:   "dataTables_processing card",
	sPageButton:   "paginate_button page-item"
});

// Bootstrap paging button renderer
DataTable.ext.renderer.pageButton.bootstrap = function ( settings, host, idx, buttons, page, pages ) {
	// ... existing code ...
};

// Your DataTable initialization code
$(document).ready(function () {
    var dataTable = $('#dataTableHover').DataTable(); // Store reference to DataTable

    // Handle form submission for adding new member
    $('#memberForm').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get input values
        var name = $('#name').val();
        var position = $('#position').val();
        var office = $('#office').val();
        var age = $('#age').val();
        var startDate = $('#startDate').val();
        var salary = $('#salary').val();

        // Add a new row to the DataTable
        dataTable.row.add([
            name,
            position,
            office,
            age,
            startDate,
            salary,
            '<button class="btn btn-danger btn-sm delete-btn">Delete</button>' // Delete button
        ]).draw(false); // Draw the updated table

        // Clear the form inputs
        $('#memberForm')[0].reset();
    });

    // Handle delete button click
    $('#dataTableHover tbody').on('click', '.delete-btn', function () {
        // Remove the row from the DataTable
        dataTable.row($(this).parents('tr')).remove().draw();
    });
});

return DataTable;
}));