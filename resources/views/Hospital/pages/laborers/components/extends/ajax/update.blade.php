<script>
    $('#edit_member').submit(function (e) {
        e.preventDefault();
        let data = new FormData(this);
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:"POST",
            data:data,
            contentType: false,
            cache: false,
            processData: false,
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
                    //$('#show_image').css('display','none');
                    @include('Hospital.pages.messages.successMessage',['msg'=>'تم التعديل بنجاح'])
                }
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
