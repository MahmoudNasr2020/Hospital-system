$("#tree-1").treegrid({initialState: 'collapsed'});
$("#tree-1").DataTable({
    dom: 'Bfrtip',
    ordering: true,
    order: [[ 0, "asc" ]],
    columnDefs: [{
        orderable: false,
        targets: "no-sort"
      }],
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        'pdfHtml5'
    ]
});