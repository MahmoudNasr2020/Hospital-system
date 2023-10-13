<script>
    $('#form_add').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            url:"{{ route('hospital.room.add') }}",
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
                    $('#form_add')[0].reset();
                    $('#room_table').DataTable().ajax.reload(null, false);
                    $('#model_item_add .close').click();
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
