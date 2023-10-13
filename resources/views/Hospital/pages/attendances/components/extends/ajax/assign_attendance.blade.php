<script>
    $('#save_attendance').on('click',function(){
        let data = [];
        let route = "{{ route('hospital.attendance.assign_attendance') }}";
        let attendance_date =  $('#date').attr('data-value');
        $('.radio_attendance:checked').each(function(){
            let id = $(this).data('id');
            let attendance = $(this).data('attendance');
            let note = $(this).parents('tr').find('.note').val();
            data.push({id:id,attendance:attendance,note:note});
        });
        $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            data:{data:data,attendance_date:attendance_date},
            beforeSend:function(){
                $('#php ').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){

                $('#save_attendance').removeAttr('disabled'); //to remove button disabled
                @include('Hospital.pages.messages.successMessage',['msg'=>'تم الحذف بنجاح'])
            },
            error:function (reject){
                //if process unsuccessful
                $('#save_attendance').removeAttr('disabled'); //to remove button disabled
                $.each(reject.responseJSON.errors,function(key,val){
                    //this loop to print any error
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])

                });
            },

        });
    });
</script>
