<script>
    //where click edit button
    $(document).on('click','.edit',function(){
        let id =$(this).data('id');
        let route = $(this).data('route');
        $("#room_number_update").val('');
        $("#beds_update").val('');
        $("#id").val('');
        $.ajax({
            method:"GET",
            url:route,
            data:id,
            success:function (data) {
                if(data === 'error')
                {
                    $('#assign_room_table').DataTable().ajax.reload(null, false);
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $("#patient_name_update").empty();
                    $('#patient_name_update').append('<option value="'+data.id+'">'+data.name+' ('+ data.identify_no +')</option>');
                    $(".option_room").removeAttr('selected');
                    $(".option_room[value="+data.room_id+"]").attr('selected',true);
                    $('#id').val(data.id);
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

                    else if(data === "notFound")
                    {
                        @include("Hospital.pages.messages.errorMessage",['msg'=>'المريض او الغرفة غير مسجلين لدينا'])
                    }

                    else if(data === "not_available")
                    {
                        @include("Hospital.pages.messages.errorMessage",['msg'=>'هذه الغرفة مكتملة الرجاء التسجيل في غرفة اخري'])
                    }

                    else
                    {
                        $('#assign_room_table').DataTable().ajax.reload(null, false);
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
