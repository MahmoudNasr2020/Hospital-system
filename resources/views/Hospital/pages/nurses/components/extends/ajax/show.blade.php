<script>
    $(document).on('click','.showing',function () {
        let route = $(this).data('route');
        $("#department_name").text('');
        $("#department_description").text('');
        $.ajax({
            method:"GET",
            url:route,
            success:function (data) {
                if(data === 'error')
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $("#department_name").text('الاسم : '+data.name);
                   if(data.description !==null)
                   {
                       $("#department_description").text('الوصف : '+data.description);
                   }
                    $('#show_item').click(); //click button to open update modal
                }
            },
        });
    });
</script>
