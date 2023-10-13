<script>
    $('#form_add').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url:"{{ route('hospital.assign_room.add') }}",
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
                else if(data === "notFound")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'المريض او الغرفة غير مسجلين لدينا'])
                }
                else if(data === "exists")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا المريض مسجل في غرفة بالفعل'])
                }
                else if(data === "not_available")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذه الغرفة مكتملة الرجاء التسجيل في غرفة اخري'])
                }
                else
                {
                    $('#form_add')[0].reset();
                    $('#assign_room_table').DataTable().ajax.reload(null, false);
                    $('#model_item_add .close').click();
                    @include('Hospital.pages.messages.successMessage',['msg'=>'تم الحفظ بنجاح'])
                }
                $("#submit_button").removeAttr('disabled');

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
