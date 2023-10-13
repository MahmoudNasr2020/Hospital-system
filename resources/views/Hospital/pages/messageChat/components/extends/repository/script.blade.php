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
<script src="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.js') }}"></script>
<script src="{{ asset('Dashboard/assets/plugins/datepicker/datepicker.ar-AE.js') }}"></script>
@include('Hospital.pages.messageChat.components.extends.ajax.container')
<script>

    $(document).ready(function () {
        //let sender_id = "{{ \Illuminate\Support\Facades\Auth::user()->id }}";//1
        //let receiver_id = $(".chat-desc").data('receiver_id');//2
        //console.log(receiver_id); 12   21
        let chat = $('.chat-content');
        Echo.channel('Message.1')
            .listen('sendMessage', (e) => {
                chat.append('<li class="clearfix">\n' +
                    '<div class="message-data text-right" style="text-align: left;">\n' +
                    '<span class="message-data-time" style="display: block;">'+e.sender_name+'</span>\n' +
                    '</div>\n' +
                    '<div class="message other-message float-right" style="float: left">'+e.message +'</div>\n' +
                    '<div class="" style="text-align: left;">\n' +
                    '<span class="message-data-time" style="display: block;">10:10 AM, Today</span>\n' +
                    '</div>\n' +
                    '</li>')
            });
    })

    $('#reload_table').on('click',function () {
        $('#attendance_table').DataTable().ajax.reload(null, false);
    })

    $('#date').datepicker({
        language:'ar-AE',
        autoPick:true,
    });


</script>
