<script>
    $('#add_member').submit(function (e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url:"{{ route('hospital.accountant.add') }}",
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
                    $('#show_image').css('display','none');
                    $('#add_member')[0].reset();
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
