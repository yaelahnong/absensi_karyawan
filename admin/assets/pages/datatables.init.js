/*
 Template Name: Stexo - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Datatable js
 */

$(document).ready(function() {
    $('#datatable').DataTable({
        "order": false
    });

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: [{
            extend: 'excelHtml5'
            // customize: function ( xlsx ){
            //     var sheet = xlsx.xl.worksheets['sheet1.xml'];
                
            //     // jQuery selector to add a border
            //     $('row c[r*="10"]', sheet).attr( 's', '25' );
            // }
        }, {
            extend: 'pdfHtml5',
            customize: function(doc) {
                console.dir(doc)
                doc.content[1].margin = [ 30, 0, 30, 0 ] //left, top, right, bottom
            }
        }],
        order: false
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );