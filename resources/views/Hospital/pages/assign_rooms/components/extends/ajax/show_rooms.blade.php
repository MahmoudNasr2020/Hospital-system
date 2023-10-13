<script>
    $(document).on('click','#showing_rooms',function () {
        let route = $(this).data('route');
        $("#room_number").text('');
        $("#beds").text('');
        $.ajax({
            method:"GET",
            url:route,
            success:function (data) {
                if(data === 'error')
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'لا توجد بيانات متاحة'])
                }
                else
                {
                    $('.table_showing').empty('');
                    $('.table_showing').append('<tr> <td> القسم </td> <td> رقم الغرفة </td>  <td> عدد السرائر </td> <td> السرائر المتاحة </td> </tr> ');
                    $.each(data,function (key,val) {
                        $('.table_showing').append('<tr> <td>'+val.department.name+'</td><td>'+val.room_number+'</td><td> '+val.beds+' </td> <td> '+(val.beds - val.patients_count)+' </td> </tr>');
                    })
                    $('#show_item').click(); //click button to open update modal
                }
            },
        });
    });
</script>
