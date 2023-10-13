<script>
    $(document).on('change','.status',function () {
        let status = $(this).is(':checked') ? 'مفعل' : 'معطل';
        let id = $(this).data('id');
        $.ajax({
            method:"POST",
            url:"{{ route('hospital.laborer.status') }}",
            data:{id:id,status:status},
            success:function (data) {
                if(data === "error")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                }
            },
        });
    });
</script>
