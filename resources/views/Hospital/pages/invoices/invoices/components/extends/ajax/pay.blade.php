<script>
    //where click edit button
    $(document).on('click','.pay',function(){
        let data =$(this).data('invoice');
        let route = $(this).data('route');
        $("#amount_total").empty();
        $("#amount_deserve").empty();
        $("#amount_paid").empty();
        $("#id").val('');
        $.ajax({
            method:"POST",
            url:route,
            data: {data:data},
            success:function (data) {
                if(data === 'error')
                {
                    $('#invoice_table').DataTable().ajax.reload(null, false);
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $("#amount_total").html('<h6>المبلغ الاجمالي : '+data.total+'</h6>');
                    $("#amount_deserve").html('<h6>المبلغ المستحق : '+ (data.total - data.amount_paid) +'</h6>');
                    $("#amount_paid").html('<h6>المبلغ المدفوع : '+ data.amount_paid +'</h6>');
                    $("#id").val(data.id);
                    $('#item_pay').click(); //click button to open update modal
                }
            },
        });
    });


    //pay cache
    $('#cache_button').on('click',function (e) {
        e.preventDefault();
        let data = $('#form_pay').serialize();
        $.ajax({
            url:"{{ route('hospital.invoice.payCache') }}",
            method:"POST",
            data:data,
            beforeSend:function () {
                $("#cache_button").attr('disabled','disabled');
                $("#online_button").attr('disabled','disabled');
            },
            success:function (data) {
                if(data === "error")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                }
                else
                {
                    $('#form_pay')[0].reset();
                    $('#invoice_table').DataTable().ajax.reload(null, false);
                    $('#model_item_pay .close').click();
                    @include('Hospital.pages.messages.successMessage',['msg'=>'تم الحفظ بنجاح'])
                }
                $("#cache_button").removeAttr('disabled');
                $("#online_button").removeAttr('disabled');
            },
            error:function (reject) {
                $("#cache_button").removeAttr('disabled');
                $("#online_button").removeAttr('disabled');
                var errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("Hospital.pages.messages.errorMultiMessage")
                });
            }
        });
    })

    //pay online
    $('#online_button').on('click',function (e) {
        e.preventDefault();
        let data = $('#form_pay').serialize();
        $.ajax({
            url:"{{ route('hospital.invoice.payOnline') }}",
            method:"POST",
            data:data,
           beforeSend:function () {
                $("#cache_button").attr('disabled','disabled');
                $("#online_button").attr('disabled','disabled');
            },
            success:function (data) {
                if(data === "error")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                }
                else
                {
                    //$('#form_pay')[0].reset();
                    //$('#invoice_table').DataTable().ajax.reload(null, false);
                    //$('#model_item_pay .close').click();
                    window.open(data, '_blank');
                    $('#model_item_pay .close').click();
                    $('#form_pay')[0].reset();
                }
                $("#cache_button").removeAttr('disabled');
                $("#online_button").removeAttr('disabled');
            },
            error:function (reject) {
                $("#cache_button").removeAttr('disabled');
                $("#online_button").removeAttr('disabled');
                var errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("Hospital.pages.messages.errorMultiMessage")
                });
            }
        });
    })

</script>
