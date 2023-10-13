<script>
    //where click edit button
    $(document).on('click','.edit',function(){
        let id =$(this).data('id');
        let route = $(this).data('route');
        $("#total_update").val('');
        $("#invoice_id").val('');
        $.ajax({
            method:"POST",
            url:route,
            data: {id:id},
            success:function (data) {
                if(data === 'error')
                {
                    $('#invoice_table').DataTable().ajax.reload(null, false);
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $("#total_update").val(data.total);
                    $("#invoice_id").val(data.id);
                    $('#update_item').click(); //click button to open update modal
                }
            },
        });
    });

    // update item
    $('#form_update').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:"POST",
            data:data,
            beforeSend:function () {
                $("#submit_button_update").attr('disabled','disabled');
            },
            success:function (data) {
                if(data === "error")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                }
                else if(data==="not_found")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $('#invoice_table').DataTable().ajax.reload(null, false);
                    $('#form_update')[0].reset();
                    $('#model_item_update .close').click();
                    @include('Hospital.pages.messages.successMessage',['msg'=>'تم التعديل بنجاح'])
                }
                $("#submit_button_update").removeAttr('disabled');


            },
            error:function (reject) {
                $("#submit_button_update").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("Hospital.pages.messages.errorMultiMessage")
                });
            }
        });
    });

</script>
