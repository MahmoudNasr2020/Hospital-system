<script src="https://cdn.tiny.cloud/1/z7esyag8jyfvog4r5dxavo64j4c2rngacifdh8mrue7ql1l7/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
<script>
    tinymce.init({
        selector: '#editor',
        language: 'ar',
        directionality : 'rtl',
        height:400,
        fontsize_formats:
            "8pt 9pt 10pt 11pt 12pt 14pt 16pt 18pt 24pt 30pt 36pt 48pt 60pt 72pt 96pt",
        plugins: 'a11ychecker advcode casechange export formatpainter linkchecker autolink lists media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image emoticons',
        toolbar: 'a11ycheck casechange checklist code export formatpainter   table image undo redo fontsizeselect styleselect bold italic forecolor  backcolor | addcomment showcomments pageembed permanentpen bullist numlist outdent indent alignleft  aligncenter alignright alignjustify emoticons',
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        },
        file_picker_callback (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight

            tinymce.activeEditor.windowManager.openUrl({
                url : '/file-manager/tinymce5',
                title : 'Laravel File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content, { text: message.text })
                }
            })
        }

    });
</script>
