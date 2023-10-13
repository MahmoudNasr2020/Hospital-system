<script>
    //where click edit button
    $(document).on('click','.edit',function(){
        let id =$(this).data('id');
        let route = $(this).data('route');
        $("#name").val('');
        $("#description").val('');
        $("#id").val('');
        $.ajax({
            method:"GET",
            url:route,
            data:id,
            success:function (data) {
                if(data === 'error')
                {
                    $('#department_table').DataTable().ajax.reload(null, false);
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $("#name_update").val(data.name);
                    $("#description_update").val(data.description);
                    $("#id").val(data.id);
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
                    if(data === "unknown error")
                    {
                        @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                    }
                    else if(data==="not found")
                    {
                        @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                    }
                    else
                    {
                        $("#submit_button_update").removeAttr('disabled');
                        $('#form_update')[0].reset();
                        $('#department_table').DataTable().ajax.reload(null, false);
                        $('#model_item_update .close').click();
                        @include('Hospital.pages.messages.successMessage',['msg'=>'تم التعديل بنجاح'])
                    }

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
