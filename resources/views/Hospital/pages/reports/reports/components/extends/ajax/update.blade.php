<script>
    $('#form_edit').submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        let route = $(this).data('route');
        $.ajax({
            url:route,
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
                    @include('Hospital.pages.messages.successMessage',['msg'=>'تم التعديل بنجاح'])
                }
                $("#submit_button").removeAttr('disabled');
            },
            error:function (reject) {
                $("#submit_button").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("Hospital.pages.messages.errorMultiMessage")
                });
            }
        });
    });
</script>
