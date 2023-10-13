<script>
    $('#form_search').on('submit',function(e){
        e.preventDefault();
        let table = $("#attendance_table");
        //let data = $(this).serialize();
        let user = $("#user").val();
        let date = $("#date").val();
        $('#date').attr('data-value',date); //to set date in attributes data value
        $(".card_user").text($("#user option:selected" ).text());
        let month = "{{ request()->segment(3) }}";
        $('.loader').css('display','block');
        $('#submit_button').attr('disabled','disabled');
        setTimeout(function(){
            $('.loader').css('display','none');
            $('#card_table').css('display','block');
            $('#submit_button').removeAttr('disabled');
            //$('#usersTable').DataTable().ajax.reload(null, false);  //to reloade dataTables
            // table.draw();
            table.DataTable({
                processing: true,
                serverSide: true,
                dataType: "json",
                //"sAjaxDataProp": "",
                dataSrc: '',
                dom:'Blfrtip',

                "bDestroy": true, //to destroy data in datatables when make request
                ajax:{
                    url: "{{ route('hospital.attendance.search') }}",
                    method:"POST",
                    //dataSrc: '',
                    data: {user:user,date:date,datatable: true},

                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data:'name', name:'name'},
                    {data:'identify_no', name:'identify_no'},
                    {data:'added_by', name:'added_by'},
                    {data:'attendance', name:'attendance'},
                    {data:'note',name:'note'},

                ]
            });

            $.ajax({
                url: "{{ route('hospital.attendance.search') }}",
                method:"POST",
                //dataSrc: '',
                data: {user:user,date:date},
                success:function(data)
                {

                },

            });

        },2000);
    });




</script>
