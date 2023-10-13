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
                Noty.button('نعم','btn btn-danger mr-2', function () {
                    let y = new Noty({
                        theme: 'relax',
                        type: 'alert',
                        text: 'سيتم حذف كل العناصر المتعلقة بهذا العنصر',
                        layout:"topRight",
                        killer:true,
                        buttons: [
                            Noty.button('حذف','btn btn-danger mr-2', function () {

                                $.ajax({
                                    method: "POST",
                                    url: route,
                                    data:{_method:'DELETE'},
                                    success: function (data)
                                    {
                                        $('#patient_table').DataTable().ajax.reload(null, false);
                                        y.close();
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
                            Noty.button('الغاء', 'btn btn-light', function () {
                                y.close();
                                n.close();
                            }),
                        ],
                    });
                    y.show();

                }),
                Noty.button('لا', 'btn btn-light', function () {
                    n.close();
                }),
            ],
        });
        n.show();
    });

    </script>
