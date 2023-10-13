<script>

    $(document).on('click', '.delete_pay', function () {
        let month =$(this).data('month');
        let user =$(this).data('user');
        let route = $(this).data('route');
        let n = new Noty({
            theme: 'relax',
            type: 'alert',
            text: 'الغاء صرف الراتب لهذا المستخدم؟',
            layout:"topRight",
            killer:true,
            buttons: [
                Noty.button('Yes','btn btn-danger mr-2', function () {
                    $.ajax({
                        method: "POST",
                        url: route,
                        data:{month:month,user:user},
                        success: function (data)
                        {
                            $('#attendance_table').DataTable().ajax.reload(null, false);
                            n.close();
                            if (data === 'error')
                            {
                                @include("Hospital.pages.messages.errorMessage",['msg'=>'هذا العنصر غير موجود'])
                            }
                            else
                            {
                                @include('Hospital.pages.messages.successMessage',['msg'=>'تم الحذف بنجاح'])
                            }
                        }
                    });
                }),
                Noty.button('No', 'btn btn-light', function () {
                    n.close();
                }),
            ],
        });
        n.show();
    });

    </script>
