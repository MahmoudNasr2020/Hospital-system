<script>
    $(document).on('click','.pay',function(e){
        e.preventDefault();
        let month =$(this).data('month');
        let user =$(this).data('user');
        let route = $(this).data('route');
        let salary = $(this).parents('tr').children('td').children('.pay_parg').text();
        $('#salary').text(salary);
        $("#salary_paid").val('');
        $("#incentives").val('');
        $("#Discounts").val('');
        $('#user_id').val('');
        $('#month_id').val('');
        $.ajax({
            method:"POST",
            url:route,
            data:{month:month,user:user},
            success:function (data) {
                if(data.status !== 'not_found')
                {
                    $("#salary_paid").val(data.salary_paid);
                    $("#incentives").val(data.incentives);
                    $("#discounts").val(data.discounts);
                }
                else
                {
                    $("#salary_paid").val(0);
                    $("#incentives").val(0);
                    $("#discounts").val(0);
                }
                $('#user_id').val(data.user_id);
                $('#month_id').val(data.month_id);
                $('#pay_item').click(); //click button to open update modal
            },
        });
    });

    $('#form_pay').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url:"{{ route('hospital.salary.cashing') }}",
            method:"POST",
            data:data,
            beforeSend:function () {
                $("#submit_button").attr('disabled','disabled');
            },
            success:function (data) {
                if(data === "error")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                }
                else
                {
                    $("#submit_button").removeAttr('disabled');
                    $('#form_pay')[0].reset();
                    $('#salary_table').DataTable().ajax.reload(null, false);
                    $('#model_item_pay .close').click();
                    @include('Hospital.pages.messages.successMessage',['msg'=>'تم الحفظ بنجاح'])
                }

            },
            error:function (reject) {
                $("#submit_button").removeAttr('disabled');
                var errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("Hospital.pages.messages.errorMultiMessage")
                });
            }
        });
    });
</script>
