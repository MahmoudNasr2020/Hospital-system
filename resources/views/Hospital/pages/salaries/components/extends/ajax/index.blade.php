<script>
    $('#form_search').on('submit',function(e){
        e.preventDefault();
        let table = $("#salary_table");
        let data = $(this).serialize();
        let user = $("#user").val();
         $(".card_user").text($("#user option:selected" ).text());
        let month = "{{ request()->segment(3) }}";
        console.log(month);
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
                    url: "{{ route('hospital.salary.search') }}",
                    method:"POST",
                    //dataSrc: '',
                    data: {data:user,month:month,datatable: true},

                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data:'name', name:'name'},
                    {data:'identify_no', name:'identify_no'},
                    {data:'salary', name:'salary'},
                    {data:'total_paid', name:'total_paid'},
                    {data:'incentives', name:'incentives'},
                    {data:'discounts', name:'discounts'},
                    {data:'added_by', name:'added_by'},
                    {data:'status', name:'status'},
                    {data:'action',name:'action',orderable: false, searchable: false},

                ]
            });

            $.ajax({
                url: "{{ route('hospital.salary.search') }}",
                method:"POST",
                //dataSrc: '',
                data: {data:user,month:month},
                success:function(data)
                {

                },

            });

        },2000);
    });




</script>
