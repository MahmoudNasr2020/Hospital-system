<script>

    $(document).on('click', '.delete', function () {
        let route = $(this).data('route');
        let n = new Noty({
            theme: 'relax',
            type: 'alert',
            text: 'حذف هذا العنصر',
            layout:"topRight",
            killer:true,
            buttons: [
                Noty.button('Yes','btn btn-danger mr-2', function () {
                    $.ajax({
                        method: "POST",
                        url: route,
                        data:{_method:'DELETE'},
                        success: function (data)
                        {
                            $('#room_table').DataTable().ajax.reload(null, false);
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
