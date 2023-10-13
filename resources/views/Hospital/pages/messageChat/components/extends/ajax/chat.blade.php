<script>
    $('.chat-person').on('click',function(){
        let route = $(this).data('route');
        let receiver_id = $(this).data('receiver_id');
        $('.loader').css('display','block');
        $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            data:{receiver_id:receiver_id},
            beforeSend:function(){
                $('#save_attendance').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                $('.loader').css('display','none');
                let auth_id = "{{ \Illuminate\Support\Facades\Auth::user()->id }}";
                let chat = $('.chat-content');
                chat.empty();
                let chat_about = $('.chat-desc');
                chat_about.attr('data-receiver_id',data[0].receiver_id);
                $.each(data,function (key,val) {
                   if(val['sender_id'] === auth_id)
                   {

                       chat.append(' <li class="clearfix">\n' +
                                       '<div class="message-data text-right" >\n' +
                                       '<span class="message-data-time" style="display: block;">انت</span>\n' +
                                       '</div>\n' +
                                       '<div class="message my-message">'+val['message']+'</div>\n' +
                                       '<span class="message-data-time" style="display: block;direction: ltr;\n">10:10 AM, Today</span>\n' +
                           '</li>');
                   }
                   else
                   {
                       chat.append('<li class="clearfix">\n' +
                           '<div class="message-data text-right" style="text-align: left;">\n' +
                           '<span class="message-data-time" style="display: block;">'+val['sender']['name']+'</span>\n' +
                           '</div>\n' +
                           '<div class="message other-message float-right" style="float: left">'+ val['message'] +'</div>\n' +
                           '<div class="" style="text-align: left;">\n' +
                           '<span class="message-data-time" style="display: block;">10:10 AM, Today</span>\n' +
                           '</div>\n' +
                           '</li>');
                   }
                });
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

    $('#chat-message').submit(function (e) {
        e.preventDefault();
        let route = "{{ route('hospital.message.send') }}";
        let sender_id = "{{ \Illuminate\Support\Facades\Auth::user()->id }}";
        let receiver_id = $('.chat-desc').data('receiver_id');
        let data = $(this).serializeArray();
        let chat = $('.chat-content');
        data.push({name:'receiver_id',value:receiver_id});
        $.ajax({
            //this code to update session
            method:'POST',
            url:route,
            data:data,
            beforeSend:function(){
                $('#btn-send').attr('disabled','disabled'); //to set button disabled even process success or reject
            },
            success:function (data){
                if(data === "error")
                {
                    @include("Hospital.pages.messages.errorMessage",['msg'=>'حدث خطأ ما'])
                }
                else
                {
                    chat.append('<li class="clearfix">\n' +
                                    '<div class="message-data text-right" >\n' +
                                    '<span class="message-data-time" style="display: block;">انت</span>\n' +
                                    '</div>\n' +
                                    '<div class="message my-message">'+data.message+'</div>\n' +
                                    '<span class="message-data-time" style="display: block;direction: ltr;\n">10:10 AM, Today</span>\n' +
                                '</li>');

                }

                $('#chat-message')[0].reset();
                $("#btn-send").removeAttr('disabled');
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
