<script src="{{ asset('Dashboard/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/datatable/datatable-extension/custom.js') }}"></script>
<script src="{{ asset('Dashboard/assets/js/tooltip-init.js') }}"></script>

<!--DataTables js-->
{!! $dataTable->scripts() !!}
<!--DataTables js-->
@include('Hospital.pages.assign_rooms.components.extends.ajax.container')
<script>
    $('#reload_table').on('click',function () {
        $('#assign_room_table').DataTable().ajax.reload(null, false);
    })
</script>
