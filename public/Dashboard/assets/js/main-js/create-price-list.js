
 // Setup - add a text input to each footer cell
 $('#products-list tfoot th').each( function () {
    var title = $(this).text();
    $(this).html( '<input type="text" class="shadow-sm" placeholder="Search '+title+'" />' );
} );

  

// DataTable
var table = $('#products-list').DataTable({
    ordering: true,
    searching: true,
    dom: 'tpr',
    initComplete: function () {
        // Apply the search
        this.api().columns().every( function () {
            var that = this;

            $( 'input', this.footer() ).on( 'keyup change clear', function () {
                if ( that.search() !== this.value ) {
                    that
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    }
});

$('#products-list tfoot tr').appendTo('#products-list thead');