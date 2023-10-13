<script>
    $(document).ready(function() {
        $('#main_row_check').on('change',function () {
            if($(this).is(':checked'))
            {
                $('.row_check').prop('checked',true);
                $('#multi_delete').css('display','block');
            }
            else
            {
                $('.row_check').prop('checked',false);
                $('#multi_delete').css('display','none');
            }
        });

        $(document).on('change','.row_check',function () {
            if($(this).is(':checked'))
            {
                $('#multi_delete').css('display','block');
            }
            else
            {
                if($('#main_row_check').is(':checked'))
                {
                    $('#multi_delete').css('display','block');
                }
                else
                {
                    $('#multi_delete').css('display','none');
                }
            }
        });
    });

    //delete multi item
    $('#multi_delete').on('click',function () {
        let data = [];
        let route = $(this).data('route');
        $('.row_check:checked').each(function(){
            data.push($(this).val());
        });
            if(data.length > 0)
            {
                let n = new Noty({
                    theme: 'relax',
                    type: 'alert',
                    text: 'حذف العناصر المحددة',
                    layout:"topRight",
                    killer:true,
                    buttons: [
                        Noty.button('نعم','btn btn-danger mr-2', function () {
                            let y = new Noty({
                                theme: 'relax',
                                type: 'alert',
                                text: 'سيتم حذف كل العناصر المتعلقة بتلك العناصر',
                                layout:"topRight",
                                killer:true,
                                buttons: [
                                    Noty.button('حذف','btn btn-danger mr-2', function () {
                                        $.ajax({
                                            method: "POST",
                                            url: route,
                                            data:{data:data},
                                            success: function (data)
                                            {
                                                $('#patient_table').DataTable().ajax.reload(null, false);
                                                y.close();
                                                n.close();
                                                $('#multi_delete').css('display','none');
                                                $('.row_check').prop('checked',false);
                                                $('#main_row_check').prop('checked',false);
                                                @include('Hospital.pages.messages.successMessage',['msg'=>'تم الحذف بنجاح'])
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
            }
            else
            {
                @include("Hospital.pages.messages.errorMessage",['msg'=>'يجب اختيار العناصر المراد حذفها'])
            }

    });
</script>
