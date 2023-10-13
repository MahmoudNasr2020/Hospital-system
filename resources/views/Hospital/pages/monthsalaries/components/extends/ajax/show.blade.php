<script>
    $(document).on('click','.showing',function () {
        let route = $(this).data('route');
        $("#room_number").text('');
        $("#beds").text('');
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
                    $("#room_number").text('رقم الغرفة : '+data.room_number);
                    $("#beds").text('السرائر : '+data.beds);
                    $('#show_item').click(); //click button to open update modal
                }
            },
        });
    });
</script>
