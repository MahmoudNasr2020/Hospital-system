<script>
    $(document).ready(function() {
        $('#check_all').on('click',function () {
            $(this).toggleClass('check');
            if($(this).hasClass('check'))
            {
                $('.form-check-input').prop('checked',true);
            }
            else
            {
                $('.form-check-input').prop('checked',false);
            }
        });
    });
</script>
